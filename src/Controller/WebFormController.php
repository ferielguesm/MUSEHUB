<?php

namespace App\Controller;

use App\Entity\Artwork;
use App\Entity\Listing;
use App\Entity\Offre;
use App\Entity\Post;
use App\Entity\Comment;
use App\Entity\Participant;
use App\Repository\ArtworkRepository;
use App\Repository\CategoryRepository;
use App\Repository\EventRepository;
use App\Repository\ListingRepository;
use App\Repository\OffreRepository;
use App\Repository\ParticipantRepository;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use App\Service\ContentFilter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/web')]
class WebFormController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private ArtworkRepository $artworkRepository,
        private CategoryRepository $categoryRepository,
        private ListingRepository $listingRepository,
        private OffreRepository $offreRepository,
        private EventRepository $eventRepository,
        private ParticipantRepository $participantRepository,
        private ContentFilter $contentFilter
    ) {
    }

    #[Route('/artworks/create', name: 'web_artworks_create', methods: ['POST'])]
    public function createArtwork(Request $request): Response
    {
        $user = $this->getUser();
        
        // Check if user has ROLE_ARTIST or ROLE_ADMIN
        if (!$user || (!in_array('ROLE_ARTIST', $user->getRoles()) && !in_array('ROLE_ADMIN', $user->getRoles()))) {
            $this->addFlash('error', 'Vous devez être artiste pour créer une œuvre.');
            return $this->redirectToRoute('artworks');
        }
        
        $title = $request->request->get('title');
        if (!$title) {
            $this->addFlash('error', 'Le titre est requis');
            return $this->redirectToRoute('artworks');
        }

        $artwork = new Artwork();
        $artwork->setTitle($title);
        $artwork->setDescription($request->request->get('description') ?: null);
        
        // Handle file upload
        // Validate Image (Mandatory)
        $uploadedFile = $request->files->get('image_file');
        $imageUrlParam = $request->request->get('image_url');

        if ((!$uploadedFile || !$uploadedFile->isValid()) && !$imageUrlParam) {
            $this->addFlash('error', 'L\'image est obligatoire (fichier ou URL).');
            return $this->redirectToRoute('artworks');
        }

        $imageUrl = null;
        
        if ($uploadedFile && $uploadedFile->isValid()) {
            // ... (existing upload logic) ...
            // Validate file type
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($uploadedFile->getMimeType(), $allowedMimeTypes)) {
                $this->addFlash('error', 'Format d\'image non supporté. Utilisez JPG, PNG, GIF ou WEBP.');
                return $this->redirectToRoute('artworks');
            }
            
            // Validate file size (5MB max)
            if ($uploadedFile->getSize() > 5 * 1024 * 1024) {
                $this->addFlash('error', 'L\'image est trop volumineuse. Taille maximum: 5MB.');
                return $this->redirectToRoute('artworks');
            }
            
            // Generate unique filename
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $uploadedFile->guessExtension();
            $newFilename = $originalFilename . '_' . uniqid() . '.' . $extension;
            
            // Move file to uploads directory
            $uploadsDir = $this->getParameter('kernel.project_dir') . '/public/uploads/artworks';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }
            
            try {
                $uploadedFile->move($uploadsDir, $newFilename);
                $imageUrl = '/uploads/artworks/' . $newFilename;
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage());
                return $this->redirectToRoute('artworks');
            }
        } elseif ($imageUrlParam) {
            // Use URL if provided and no file uploaded
            $imageUrl = $imageUrlParam;
        }
        
        $artwork->setImageUrl($imageUrl);
        $price = $request->request->get('price');
        $artwork->setPrice($price ? (float)$price : null);
        $artwork->setArtistUuid($user->getUuid());
        $artwork->setStatus($request->request->get('status') ?: 'visible');

        $categoryId = $request->request->get('category_id');
        if (!$categoryId || $categoryId === '') {
             $this->addFlash('error', 'La catégorie est obligatoire.');
             return $this->redirectToRoute('artworks');
        }
        
        $category = $this->categoryRepository->find((int)$categoryId);
        if ($category) {
            $artwork->setCategory($category);
        }

        $this->em->persist($artwork);
        $this->em->flush();

        $this->addFlash('success', 'Œuvre créée avec succès !');
        return $this->redirectToRoute('artworks');
    }

    #[Route('/events/{id}/subscribe', name: 'web_events_subscribe', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function subscribeToEvent(int $id, Request $request): Response
    {
        $event = $this->eventRepository->find($id);
        if (!$event) {
            $this->addFlash('error', 'Événement introuvable.');
            return $this->redirectToRoute('events');
        }

        if (!$this->isCsrfTokenValid('subscribe_event_' . $id, (string)$request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('events');
        }

        $user = $this->getUser();
        $existing = $this->participantRepository->findExisting($event->getUuid(), $user->getUuid());
        if ($existing) {
            $this->addFlash('info', 'Vous êtes déjà inscrit à cet événement.');
            return $this->redirectToRoute('events');
        }

        $participant = new Participant();
        $participant->setEventUuid($event->getUuid());
        $participant->setParticipantUuid($user->getUuid());
        $participant->setStatus('pending');

        $this->em->persist($participant);
        $this->em->flush();

        $this->addFlash('success', 'Votre demande d\'inscription a été envoyée et est en attente de validation.');
        return $this->redirectToRoute('events');
    }

    #[Route('/events/{id}/unsubscribe', name: 'web_events_unsubscribe', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function unsubscribeFromEvent(int $id, Request $request): Response
    {
        $event = $this->eventRepository->find($id);
        if (!$event) {
            $this->addFlash('error', 'Événement introuvable.');
            return $this->redirectToRoute('events');
        }

        if (!$this->isCsrfTokenValid('unsubscribe_event_' . $id, (string)$request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('events');
        }

        $user = $this->getUser();
        $participant = $this->participantRepository->findExisting($event->getUuid(), $user->getUuid());

        if (!$participant) {
            $this->addFlash('info', 'Vous n’êtes pas inscrit à cet événement.');
            return $this->redirectToRoute('events');
        }

        $this->em->remove($participant);
        $this->em->flush();

        $this->addFlash('success', 'Votre inscription a été annulée.');
        return $this->redirectToRoute('events');
    }

    #[Route('/marketplace/listing/create', name: 'web_marketplace_listing_create', methods: ['POST'])]
    public function createListing(Request $request): Response
    {
        // Check if user has ROLE_ARTIST or ROLE_ADMIN
        $user = $this->getUser();
        if (!$user || (!in_array('ROLE_ARTIST', $user->getRoles()) && !in_array('ROLE_ADMIN', $user->getRoles()))) {
            $this->addFlash('error', 'Seuls les artistes et administrateurs peuvent créer des annonces.');
            return $this->redirectToRoute('marketplace');
        }

        $artworkUuid = $request->request->get('artwork_uuid');
        $price = $request->request->get('price');

        if (!$artworkUuid || !$price) {
            $this->addFlash('error', 'L\'œuvre et le prix sont requis');
            return $this->redirectToRoute('marketplace');
        }

        // Parse artwork reference (format: artistUuid-id) – artistUuid already contains hyphens
        $separatorPos = strrpos($artworkUuid, '-');
        if ($separatorPos === false) {
            $this->addFlash('error', 'Référence d\'œuvre invalide');
            return $this->redirectToRoute('marketplace');
        }

        $artistUuid = substr($artworkUuid, 0, $separatorPos);
        $artworkId = (int)substr($artworkUuid, $separatorPos + 1);

        if (!$artistUuid || !$artworkId) {
            $this->addFlash('error', 'Référence d\'œuvre invalide');
            return $this->redirectToRoute('marketplace');
        }

        $artwork = $this->artworkRepository->find($artworkId);
        
        // Verify artwork exists and belongs to user
        if (!$artwork || $artwork->getArtistUuid() !== $artistUuid || $artwork->getArtistUuid() !== $this->getUser()->getUuid()) {
            $this->addFlash('error', 'Œuvre non trouvée ou non autorisée');
            return $this->redirectToRoute('marketplace');
        }

        // Create a UUID-like identifier for the listing
        $listingArtworkUuid = $artwork->getArtistUuid() . '-' . $artwork->getId();

        $listing = new Listing();
        $listing->setArtworkUuid($listingArtworkUuid);
        $listing->setPrice((float)$price);
        $listing->setStock((int)($request->request->get('stock') ?: 1));
        $listing->setStatus('available');

        $this->em->persist($listing);
        $this->em->flush();

        $this->addFlash('success', 'Annonce créée avec succès !');
        return $this->redirectToRoute('marketplace');
    }

    #[Route('/posts/create', name: 'web_posts_create', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function createPost(Request $request, \App\Repository\PostCategoryRepository $categoryRepository): Response
    {
        $user = $this->getUser();
        $content = $request->request->get('content');

        if (!$content) {
            $this->addFlash('error', 'Le contenu est requis');
            return $this->redirectToRoute('community');
        }

        // Filter content
        $filterResult = $this->contentFilter->filterContent($content);

        // Block content with high severity score
        if ($filterResult['isBlocked']) {
            $this->addFlash('error', 'Votre publication a été bloquée en raison de contenu inapproprié. Score de gravité: ' . $filterResult['severityScore']);
            return $this->redirectToRoute('community');
        }

        // Warn about moderate issues
        if (!$filterResult['isValid']) {
            $this->addFlash('warning', 'Votre contenu a été filtré: ' . implode(', ', $filterResult['issues']));
        }

        $post = new Post();
        $post->setAuthorUuid($user->getUuid());
        $post->setContent($filterResult['filteredContent']);

        // Handle category
        $categoryId = $request->request->get('category_id');
        if ($categoryId) {
            $category = $categoryRepository->find($categoryId);
            if ($category) {
                $post->setCategory($category);
            }
        }

        $imageUrl = null;
        $uploadedImage = $request->files->get('image_file');

        if ($uploadedImage && $uploadedImage->isValid()) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($uploadedImage->getMimeType(), $allowedMimeTypes, true)) {
                $this->addFlash('error', 'Format d\'image non supporté. Utilisez JPG, PNG, GIF ou WEBP.');
                return $this->redirectToRoute('community');
            }

            if ($uploadedImage->getSize() > 5 * 1024 * 1024) {
                $this->addFlash('error', 'L\'image est trop volumineuse. Taille maximum: 5MB.');
                return $this->redirectToRoute('community');
            }

            $originalFilename = pathinfo($uploadedImage->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $uploadedImage->guessExtension() ?: 'bin';
            $newFilename = $originalFilename . '_' . uniqid() . '.' . $extension;

            $uploadsDir = $this->getParameter('kernel.project_dir') . '/public/uploads/posts';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }

            try {
                $uploadedImage->move($uploadsDir, $newFilename);
                $imageUrl = '/uploads/posts/' . $newFilename;
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage());
                return $this->redirectToRoute('community');
            }
        } elseif ($request->request->get('image_url')) {
            $imageUrl = $request->request->get('image_url');
        }

        $post->setImageUrl($imageUrl);

        $this->em->persist($post);
        $this->em->flush();

        $this->addFlash('success', 'Post publié avec succès !');
        return $this->redirectToRoute('community');
    }

    #[Route('/posts/{id}/update', name: 'web_posts_update', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function updatePost(int $id, Request $request, PostRepository $postRepository): Response
    {
        $post = $postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication introuvable.');
            return $this->redirectToRoute('community');
        }

        if (!$this->isCsrfTokenValid('update_post_' . $post->getId(), (string)$request->request->get('_token'))) {
            $this->addFlash('error', 'Le formulaire a expiré, merci de réessayer.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $user = $this->getUser();
        if (!$user || ($post->getAuthorUuid() !== $user->getUuid() && !$this->isGranted('ROLE_ADMIN'))) {
            $this->addFlash('error', 'Vous n’êtes pas autorisé à modifier cette publication.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $content = trim((string)$request->request->get('content'));
        if ($content === '') {
            $this->addFlash('error', 'Le contenu ne peut pas être vide.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $filterResult = $this->contentFilter->filterContent($content);
        if (!$filterResult['isValid']) {
            $this->addFlash('error', 'Le contenu n’est pas valide : ' . implode(', ', $filterResult['issues']));
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $post->setContent($filterResult['filteredContent']);

        $imageUrl = $post->getImageUrl();
        $uploadedImage = $request->files->get('image_file');
        $removeImage = $request->request->getBoolean('remove_image', false);

        if ($uploadedImage && $uploadedImage->isValid()) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($uploadedImage->getMimeType(), $allowedMimeTypes, true)) {
                $this->addFlash('error', 'Format d\'image non supporté. Utilisez JPG, PNG, GIF ou WEBP.');
                return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
            }

            if ($uploadedImage->getSize() > 5 * 1024 * 1024) {
                $this->addFlash('error', 'L\'image est trop volumineuse. Taille maximum: 5MB.');
                return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
            }

            $originalFilename = pathinfo($uploadedImage->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $uploadedImage->guessExtension() ?: 'bin';
            $newFilename = $originalFilename . '_' . uniqid() . '.' . $extension;

            $uploadsDir = $this->getParameter('kernel.project_dir') . '/public/uploads/posts';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }

            try {
                $uploadedImage->move($uploadsDir, $newFilename);
                $imageUrl = '/uploads/posts/' . $newFilename;
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage());
                return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
            }
        } elseif ($request->request->has('image_url')) {
            $providedUrl = trim((string)$request->request->get('image_url'));
            $imageUrl = $providedUrl !== '' ? $providedUrl : $imageUrl;
        }

        if ($removeImage) {
            $imageUrl = null;
        }

        $post->setImageUrl($imageUrl);

        $this->em->flush();

        $this->addFlash('success', 'Publication mise à jour avec succès.');
        return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
    }

    #[Route('/posts/{id}/delete', name: 'web_posts_delete', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function deletePost(int $id, Request $request, PostRepository $postRepository): Response
    {
        $post = $postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication introuvable.');
            return $this->redirectToRoute('community');
        }

        if (!$this->isCsrfTokenValid('delete_post_' . $post->getId(), (string)$request->request->get('_token'))) {
            $this->addFlash('error', 'Le formulaire a expiré, merci de réessayer.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $user = $this->getUser();
        if (!$user || ($post->getAuthorUuid() !== $user->getUuid() && !$this->isGranted('ROLE_ADMIN'))) {
            $this->addFlash('error', 'Vous n’êtes pas autorisé à supprimer cette publication.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $this->em->remove($post);
        $this->em->flush();

        $this->addFlash('success', 'Publication supprimée avec succès.');
        return $this->redirectToRoute('community');
    }

    #[Route('/posts/{id}/comment', name: 'web_posts_comment', methods: ['POST'])]
    public function commentPost(int $id, Request $request, PostRepository $postRepository): Response
    {
        $post = $postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication introuvable.');
            return $this->redirectToRoute('community');
        }

        if (!$this->isCsrfTokenValid('comment_post_' . $post->getId(), (string)$request->request->get('_token'))) {
            $this->addFlash('error', 'Le formulaire a expiré, merci de réessayer.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $content = trim((string)$request->request->get('content'));
        if ($content === '') {
            $this->addFlash('error', 'Le commentaire ne peut pas être vide.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $filterResult = $this->contentFilter->filterContent($content);

        // Block comments with high severity score
        if ($filterResult['isBlocked']) {
            $this->addFlash('error', 'Votre commentaire a été bloqué en raison de contenu inapproprié. Score de gravité: ' . $filterResult['severityScore']);
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        // Warn about moderate issues
        if (!$filterResult['isValid']) {
            $this->addFlash('warning', 'Votre commentaire a été filtré: ' . implode(', ', $filterResult['issues']));
        }

        $comment = new Comment();
        $comment->setPost($post);
        $comment->setContent($filterResult['filteredContent']);

        $user = $this->getUser();
        if ($user) {
            $comment->setCommenterUuid($user->getUuid());
        } else {
            $displayName = trim((string)$request->request->get('commenter_name'));
            if ($displayName !== '') {
                $normalizedName = preg_replace('/[^a-z0-9]+/i', '_', $displayName);
                $comment->setCommenterUuid('guest_' . strtolower(trim($normalizedName, '_')) . '_' . uniqid());
            } else {
                $comment->setCommenterUuid('guest_' . uniqid());
            }
        }

        $this->em->persist($comment);
        $this->em->flush();

        $this->addFlash('success', 'Commentaire publié avec succès !');

        return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
    }

    #[Route('/posts/{postId}/comments/{commentId}/update', name: 'web_comments_update', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function updateComment(int $postId, int $commentId, Request $request, PostRepository $postRepository, CommentRepository $commentRepository): Response
    {
        $post = $postRepository->find($postId);
        if (!$post) {
            $this->addFlash('error', 'Publication introuvable.');
            return $this->redirectToRoute('community');
        }

        $comment = $commentRepository->find($commentId);
        if (!$comment || $comment->getPost()->getId() !== $post->getId()) {
            $this->addFlash('error', 'Commentaire introuvable.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        if (!$this->isCsrfTokenValid('update_comment_' . $comment->getId(), (string)$request->request->get('_token'))) {
            $this->addFlash('error', 'Le formulaire a expiré, merci de réessayer.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $user = $this->getUser();
        if (!$user || ($comment->getCommenterUuid() !== $user->getUuid() && !$this->isGranted('ROLE_ADMIN'))) {
            $this->addFlash('error', 'Vous n’êtes pas autorisé à modifier ce commentaire.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $content = trim((string)$request->request->get('content'));
        if ($content === '') {
            $this->addFlash('error', 'Le commentaire ne peut pas être vide.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $filterResult = $this->contentFilter->filterContent($content);

        // Block comments with high severity score
        if ($filterResult['isBlocked']) {
            $this->addFlash('error', 'Votre commentaire a été bloqué en raison de contenu inapproprié. Score de gravité: ' . $filterResult['severityScore']);
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        // Warn about moderate issues
        if (!$filterResult['isValid']) {
            $this->addFlash('warning', 'Votre commentaire a été filtré: ' . implode(', ', $filterResult['issues']));
        }

        $comment->setContent($filterResult['filteredContent']);
        $this->em->flush();

        $this->addFlash('success', 'Commentaire mis à jour.');
        return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
    }

    #[Route('/posts/{postId}/comments/{commentId}/delete', name: 'web_comments_delete', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function deleteComment(int $postId, int $commentId, Request $request, PostRepository $postRepository, CommentRepository $commentRepository): Response
    {
        $post = $postRepository->find($postId);
        if (!$post) {
            $this->addFlash('error', 'Publication introuvable.');
            return $this->redirectToRoute('community');
        }

        $comment = $commentRepository->find($commentId);
        if (!$comment || $comment->getPost()->getId() !== $post->getId()) {
            $this->addFlash('error', 'Commentaire introuvable.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        if (!$this->isCsrfTokenValid('delete_comment_' . $comment->getId(), (string)$request->request->get('_token'))) {
            $this->addFlash('error', 'Le formulaire a expiré, merci de réessayer.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $user = $this->getUser();
        if (!$user || ($comment->getCommenterUuid() !== $user->getUuid() && !$this->isGranted('ROLE_ADMIN'))) {
            $this->addFlash('error', 'Vous n’êtes pas autorisé à supprimer ce commentaire.');
            return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
        }

        $this->em->remove($comment);
        $this->em->flush();

        $this->addFlash('success', 'Commentaire supprimé.');
        return $this->redirectToRoute('community', ['_fragment' => 'post-' . $post->getId()]);
    }

    #[Route('/marketplace/offre/create', name: 'web_marketplace_offre_create', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function createOffre(Request $request): Response
    {
        $listingId = $request->request->get('listing_id');
        $prixPropose = $request->request->get('prix_propose');
        $commentaire = $request->request->get('commentaire');

        if (!$listingId || !$prixPropose) {
            $this->addFlash('error', 'L\'annonce et le prix proposé sont requis');
            return $this->redirectToRoute('marketplace');
        }

        $listing = $this->listingRepository->find($listingId);
        if (!$listing) {
            $this->addFlash('error', 'Annonce introuvable');
            return $this->redirectToRoute('marketplace');
        }

        if ($listing->getStatus() !== 'available') {
            $this->addFlash('error', 'Cette annonce n\'est plus disponible');
            return $this->redirectToRoute('marketplace');
        }

        $user = $this->getUser();

        // Check if user already made an offer for this listing
        $existingOffre = $this->offreRepository->findOneBy([
            'listing' => $listing,
            'utilisateur' => $user
        ]);

        if ($existingOffre) {
            $this->addFlash('error', 'Vous avez déjà fait une offre pour cette annonce');
            return $this->redirectToRoute('marketplace');
        }

        // Validate price
        $prixProposeFloat = (float)$prixPropose;
        if ($prixProposeFloat <= 0) {
            $this->addFlash('error', 'Le prix proposé doit être positif');
            return $this->redirectToRoute('marketplace');
        }

        $offre = new Offre();
        $offre->setListing($listing);
        $offre->setUtilisateur($user);
        $offre->setPrixPropose($prixProposeFloat);
        $offre->setCommentaire($commentaire ?: null);
        $offre->setStatut('En attente');

        $this->em->persist($offre);
        
        // Create notification for seller
        // Extract seller UUID from artwork UUID (format: artistUuid-artworkId)
        $artworkUuid = $listing->getArtworkUuid();
        $separatorPos = strrpos($artworkUuid, '-');
        if ($separatorPos !== false) {
            $sellerUuid = substr($artworkUuid, 0, $separatorPos);
            
            $notification = new \App\Entity\Notification();
            $notification->setRecipientUuid($sellerUuid);
            $notification->setActorUuid($user->getUuid());
            $notification->setType(\App\Entity\Notification::TYPE_OFFER_RECEIVED);
            $notification->setMessage("Nouvelle offre de {$prixProposeFloat}€ reçue sur votre annonce !");
            $notification->setMetadata([
                'offer_id' => $offre->getId(),
                'listing_id' => $listing->getId(),
                'price' => $prixProposeFloat,
            ]);
            
            $this->em->persist($notification);
        }
        
        $this->em->flush();

        $this->addFlash('success', 'Votre offre a été envoyée avec succès !');
        return $this->redirectToRoute('marketplace');
    }
}
