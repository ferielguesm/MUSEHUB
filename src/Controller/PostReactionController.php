<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\PostReaction;
use App\Repository\PostRepository;
use App\Repository\PostReactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/api/posts')]
class PostReactionController extends AbstractController
{
    public function __construct(
        private PostRepository $postRepository,
        private PostReactionRepository $reactionRepository,
        private EntityManagerInterface $em,
        private \App\Service\DiscordNotificationService $discordService
    ) {}

    #[Route('/{id}/react', name: 'api_post_react', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function toggleReaction(int $id, Request $request): JsonResponse
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            return $this->json(['error' => 'Post not found'], 404);
        }

        $data = json_decode($request->getContent(), true);
        $type = $data['type'] ?? 'like';

        if (!in_array($type, ['like', 'dislike'])) {
            return $this->json(['error' => 'Invalid reaction type'], 400);
        }

        $user = $this->getUser();
        $userUuid = $user->getUuid();

        // Check if user already reacted
        $existingReaction = $this->reactionRepository->findOneBy([
            'post' => $post,
            'userUuid' => $userUuid
        ]);

        if ($existingReaction) {
            // If same type, remove reaction (toggle off)
            if ($existingReaction->getType() === $type) {
                $this->em->remove($existingReaction);
                $this->em->flush();
                
                return $this->json([
                    'success' => true,
                    'action' => 'removed',
                    'likes' => $this->reactionRepository->countByPostAndType($post->getId(), 'like'),
                    'dislikes' => $this->reactionRepository->countByPostAndType($post->getId(), 'dislike'),
                ]);
            }
            
            // If different type, update reaction
            $existingReaction->setType($type);
            $this->em->flush();
            
            $this->discordService->sendNotification(
                sprintf("🔄 **%s** changed reaction to '%s' on post: %s", $user->getUserIdentifier(), $type, $post->getTitle())
            );

            return $this->json([
                'success' => true,
                'action' => 'updated',
                'type' => $type,
                'likes' => $this->reactionRepository->countByPostAndType($post->getId(), 'like'),
                'dislikes' => $this->reactionRepository->countByPostAndType($post->getId(), 'dislike'),
            ]);
        }

        // Create new reaction
        $reaction = new PostReaction();
        $reaction->setPost($post);
        $reaction->setUserUuid($userUuid);
        $reaction->setType($type);

        $this->em->persist($reaction);
        $this->em->flush();

        $emoji = $type === 'like' ? '👍' : '👎';
        $this->discordService->sendNotification(
            sprintf("%s **%s** %s post: %s", $emoji, $user->getUserIdentifier(), $type === 'like' ? 'liked' : 'disliked', $post->getTitle())
        );

        return $this->json([
            'success' => true,
            'action' => 'created',
            'type' => $type,
            'likes' => $this->reactionRepository->countByPostAndType($post->getId(), 'like'),
            'dislikes' => $this->reactionRepository->countByPostAndType($post->getId(), 'dislike'),
        ]);
    }

    #[Route('/{id}/reactions', name: 'api_post_reactions', methods: ['GET'])]
    public function getReactions(int $id): JsonResponse
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            return $this->json(['error' => 'Post not found'], 404);
        }

        $user = $this->getUser();
        $userReaction = null;
        
        if ($user) {
            $reaction = $this->reactionRepository->findOneBy([
                'post' => $post,
                'userUuid' => $user->getUuid()
            ]);
            $userReaction = $reaction ? $reaction->getType() : null;
        }

        return $this->json([
            'likes' => $this->reactionRepository->countByPostAndType($post->getId(), 'like'),
            'dislikes' => $this->reactionRepository->countByPostAndType($post->getId(), 'dislike'),
            'userReaction' => $userReaction,
        ]);
    }
}
