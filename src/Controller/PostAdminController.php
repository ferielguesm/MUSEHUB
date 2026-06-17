<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class PostAdminController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private PostRepository $postRepository
    ) {}

    #[Route('/admin/posts', name: 'admin_post_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $status = $request->query->get('status', 'all');
        $sort = $request->query->get('sort', 'recent');
        $page = max(1, (int)$request->query->get('page', 1));
        $limit = 20;
        $offset = ($page - 1) * $limit;

        $qb = $this->postRepository->createQueryBuilder('p')
            ->leftJoin('p.comments', 'c')
            ->leftJoin('p.category', 'cat')
            ->addSelect('c')
            ->addSelect('cat')
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        if ($status !== 'all') {
            $qb->andWhere('p.moderationStatus = :status')
               ->setParameter('status', $status);
        }

        // Apply sorting
        switch ($sort) {
            case 'commented':
                // Use the new commentsCount field for better performance
                $qb->orderBy('p.commentsCount', 'DESC')
                   ->addOrderBy('p.createdAt', 'DESC');
                break;
            case 'liked':
                $qb->orderBy('p.likesCount', 'DESC')
                   ->addOrderBy('p.createdAt', 'DESC');
                break;
            case 'recent':
            default:
                $qb->orderBy('p.createdAt', 'DESC');
                break;
        }

        $posts = $qb->getQuery()->getResult();

        // Get total count for pagination
        $totalQb = $this->postRepository->createQueryBuilder('p')
            ->select('COUNT(p.id)');

        if ($status !== 'all') {
            $totalQb->andWhere('p.moderationStatus = :status')
                    ->setParameter('status', $status);
        }

        $total = (int)$totalQb->getQuery()->getSingleScalarResult();
        $totalPages = ceil($total / $limit);

        return $this->render('post/admin.html.twig', [
            'posts' => $posts,
            'currentStatus' => $status,
            'currentSort' => $sort,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalPosts' => $total,
        ]);
    }

    #[Route('/admin/posts/{id}/moderate', name: 'admin_post_moderate', methods: ['POST'])]
    public function moderate(int $id, Request $request): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Post not found.');
            return $this->redirectToRoute('admin_post_index');
        }

        $action = $request->request->get('action');
        $reason = $request->request->get('reason', '');

        switch ($action) {
            case 'approve':
                $post->setModerationStatus('approved');
                $post->setModerationDetails(null);
                $this->addFlash('success', 'Post approved.');
                break;

            case 'flag':
                $post->setModerationStatus('flagged');
                $post->setModerationDetails(['reason' => $reason, 'moderated_at' => date('Y-m-d H:i:s')]);
                $this->addFlash('warning', 'Post flagged for review.');
                break;

            case 'hide':
                $post->setModerationStatus('hidden');
                $post->setModerationDetails(['reason' => $reason, 'moderated_at' => date('Y-m-d H:i:s')]);
                $this->addFlash('info', 'Post hidden from public view.');
                break;

            case 'delete':
                $this->em->remove($post);
                $this->em->flush();
                $this->addFlash('success', 'Post deleted permanently.');
                return $this->redirectToRoute('admin_post_index');

            default:
                $this->addFlash('error', 'Invalid moderation action.');
                return $this->redirectToRoute('admin_post_index');
        }

        $this->em->flush();
        return $this->redirectToRoute('admin_post_index', ['status' => $request->query->get('status', 'all')]);
    }

    #[Route('/admin/posts/{id}/comments', name: 'admin_post_comments', methods: ['GET'])]
    public function comments(int $id): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            throw $this->createNotFoundException('Post not found');
        }

        return $this->render('post/admin_comments.html.twig', [
            'post' => $post,
        ]);
    }

    #[Route('/admin/comments/{id}/moderate', name: 'admin_comment_moderate', methods: ['POST'])]
    public function moderateComment(int $id, Request $request, \App\Repository\CommentRepository $commentRepository): Response
    {
        $comment = $commentRepository->find($id);
        if (!$comment) {
            $this->addFlash('error', 'Comment not found.');
            return $this->redirectToRoute('admin_post_index');
        }

        $action = $request->request->get('action');

        switch ($action) {
            case 'approve':
                // Comments don't have moderation status, just ensure they're visible
                $this->addFlash('success', 'Comment approved.');
                break;

            case 'delete':
                $this->em->remove($comment);
                $this->em->flush();
                $this->addFlash('success', 'Comment deleted.');
                break;

            default:
                $this->addFlash('error', 'Invalid action.');
        }

        return $this->redirectToRoute('admin_post_comments', ['id' => $comment->getPost()->getId()]);
    }
}
