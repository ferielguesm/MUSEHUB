<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use App\Repository\CategoryRepository;
use App\Repository\EventRepository;
use App\Repository\ListingRepository;
use App\Repository\OffreRepository;
use App\Repository\ParticipantRepository;
use App\Repository\PostReactionRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontOfficeController extends AbstractController
{
    public function __construct(
        private ArtworkRepository $artworkRepository,
        private CategoryRepository $categoryRepository,
        private EventRepository $eventRepository,
        private ListingRepository $listingRepository,
        private OffreRepository $offreRepository,
        private PostRepository $postRepository,
        private PostReactionRepository $postReactionRepository,
        private ParticipantRepository $participantRepository,
        private UserRepository $userRepository,
        private \App\Service\MatrixService $matrixService,
        private \App\Service\IssoService $issoService
    ) {
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        // Sélection d'œuvres pour la page d'accueil
        $visibleArtworks = $this->artworkRepository->findBy(
            ['status' => 'visible'],
            ['id' => 'DESC'],
            12
        );

        $featuredArtworks = array_slice($visibleArtworks, 0, min(6, count($visibleArtworks)));
        $latestArtworks = count($visibleArtworks) > 6
            ? array_slice($visibleArtworks, 6)
            : $visibleArtworks;

        $artistNames = $this->buildArtistNamesMap($visibleArtworks);
        
        $upcomingEvents = $this->eventRepository->findUpcoming();
        $latestPosts = $this->postRepository->findBy([], ['createdAt' => 'DESC'], 3);

        // Calculate statistics
        $totalArtworks = $this->artworkRepository->count(['status' => 'visible']);
        $totalArtists = count($this->userRepository->createQueryBuilder('u')
            ->where('u.roles LIKE :role')
            ->setParameter('role', '%ROLE_ARTIST%')
            ->getQuery()
            ->getResult());
        $totalEvents = $this->eventRepository->count([]);
        $totalUsers = $this->userRepository->count([]);

        return $this->render('front/home.html.twig', [
            'featuredArtworks' => $featuredArtworks,
            'latestArtworks' => $latestArtworks,
            'artistNames' => $artistNames,
            'events' => array_slice($upcomingEvents, 0, 3),
            'posts' => $latestPosts,
            'stats' => [
                'artworks' => $totalArtworks,
                'artists' => $totalArtists,
                'events' => $totalEvents,
                'users' => $totalUsers,
            ],
        ]);
    }

    /**
     * Construit une table de correspondance UUID artiste => nom public.
     *
     * @param array<int, \App\Entity\Artwork> $artworks
     */
    private function buildArtistNamesMap(array $artworks): array
    {
        $artistUuids = array_values(array_unique(array_filter(array_map(
            static fn($artwork) => $artwork->getArtistUuid(),
            $artworks
        ))));

        return $this->fetchUserNamesByUuid($artistUuids, 'Artiste MuseHub');
    }

    #[Route('/artworks', name: 'artworks')]
    public function artworks(Request $request): Response
    {
        $filters = [
            'category' => $request->query->get('category'),
            'min_price' => $request->query->get('min_price'),
            'max_price' => $request->query->get('max_price'),
            'sort' => $request->query->get('sort'),
            'direction' => $request->query->get('direction'),
        ];

        $artworks = $this->artworkRepository->findAllWithFilters($filters);
        $categories = $this->categoryRepository->findAll();

        return $this->render('front/artworks.html.twig', [
            'artworks' => $artworks,
            'categories' => $categories,
            'filters' => $filters,
        ]);
    }

    #[Route('/artworks/{id}', name: 'artwork_show', requirements: ['id' => '\d+'])]
    public function artworkShow(int $id): Response
    {
        $artwork = $this->artworkRepository->find($id);
        if (!$artwork || $artwork->getStatus() !== 'visible') {
            throw $this->createNotFoundException('Œuvre introuvable');
        }

        $artist = null;
        if ($artwork->getArtistUuid()) {
            $artist = $this->userRepository->findOneBy(['uuid' => $artwork->getArtistUuid()]);
        }

        return $this->render('front/artwork_show.html.twig', [
            'artwork' => $artwork,
            'artist' => $artist,
        ]);
    }

    #[Route('/artists', name: 'artists')]
    public function artists(): Response
    {
        return $this->render('front/artists.html.twig');
    }

    #[Route('/events', name: 'events')]
    public function events(): Response
    {
        $events = $this->eventRepository->findUpcoming();
        $participationMap = [];
        $user = $this->getUser();

        if ($user) {
            $participations = $this->participantRepository->findByParticipantUuid($user->getUuid());
            foreach ($participations as $participant) {
                $participationMap[$participant->getEventUuid()] = true;
            }
        }

        return $this->render('front/events.html.twig', [
            'events' => $events,
            'participationMap' => $participationMap,
        ]);
    }

    #[Route('/events/{id}', name: 'event_show', requirements: ['id' => '\d+'])]
    public function eventShow(int $id): Response
    {
        $event = $this->eventRepository->find($id);
        if (!$event) {
            throw $this->createNotFoundException('Événement introuvable');
        }

        $user = $this->getUser();
        $isRegistered = false;
        if ($user) {
            $isRegistered = $this->participantRepository->findOneBy([
                'eventUuid' => $event->getUuid(),
                'participantUuid' => $user->getUuid()
            ]) !== null;
        }

        return $this->render('front/event_show.html.twig', [
            'event' => $event,
            'isRegistered' => $isRegistered,
        ]);
    }

    #[Route('/marketplace', name: 'marketplace')]
    public function marketplace(): Response
    {
        $listings = $this->listingRepository->findAvailable();

        // Get offers for each listing
        $offresParListing = [];
        $artworksParListing = [];
        
        foreach ($listings as $listing) {
            $offresParListing[$listing->getId()] = $this->offreRepository->findByListing($listing->getId());
            
            // Parse artwork UUID to get artwork
            $artworkUuid = $listing->getArtworkUuid();
            $separatorPos = strrpos($artworkUuid, '-');
            if ($separatorPos !== false) {
                $artworkId = (int)substr($artworkUuid, $separatorPos + 1);
                $artwork = $this->artworkRepository->find($artworkId);
                if ($artwork) {
                    $artworksParListing[$listing->getId()] = $artwork;
                }
            }
        }

        // Get artworks that the user owns (if logged in as artist) for creating listings
        $userArtworks = [];
        $user = $this->getUser();
        if ($user && (in_array('ROLE_ARTIST', $user->getRoles()) || in_array('ROLE_ADMIN', $user->getRoles()))) {
            $userArtworks = $this->artworkRepository->findBy(
                ['artistUuid' => $user->getUuid()],
                ['id' => 'DESC']
            );
        }

        return $this->render('front/marketplace.html.twig', [
            'listings' => $listings,
            'offresParListing' => $offresParListing,
            'artworksParListing' => $artworksParListing,
            'userArtworks' => $userArtworks,
        ]);
    }

    #[Route('/marketplace/offers/{id}', name: 'marketplace_offer_show', requirements: ['id' => '\d+'])]
    public function marketplaceOffer(int $id): Response
    {
        $listing = $this->listingRepository->find($id);
        if (!$listing) {
            throw $this->createNotFoundException('Annonce introuvable');
        }

        return $this->render('front/marketplace_offer.html.twig', [
            'listing' => $listing,
        ]);
    }

    #[Route('/community', name: 'community')]
    public function community(Request $request): Response
    {
        $sort = $request->query->get('sort', 'recent');

        $posts = $this->postRepository->findWithFilters(null, $sort, 20);
        $authorNames = $this->buildAuthorNamesMap($posts);
        $commentAuthorNames = $this->buildCommenterNamesMap($posts);
        $userReactions = $this->buildUserReactionMap($posts);

        // Get Matrix public rooms if configured
        $matrixRooms = $this->matrixService->getPublicRooms(5);

        // Check if Isso is configured
        $issoConfigured = $this->issoService->isConfigured();

        return $this->render('front/community.html.twig', [
            'posts' => $posts,
            'authorNames' => $authorNames,
            'commentAuthorNames' => $commentAuthorNames,
            'userReactions' => $userReactions,
            'currentSort' => $sort,
            'matrixRooms' => $matrixRooms,
            'issoConfigured' => $issoConfigured,
            'issoService' => $this->issoService,
        ]);
    }

    /**
     * Retourne les noms publics des auteurs de posts.
     *
     * @param array<int, \App\Entity\Post> $posts
     */
    private function buildAuthorNamesMap(array $posts): array
    {
        $authorUuids = array_values(array_unique(array_filter(array_map(
            static fn($post) => $post->getAuthorUuid(),
            $posts
        ))));

        return $this->fetchUserNamesByUuid($authorUuids);
    }

    /**
     * @param array<int, \App\Entity\Post> $posts
     */
    private function buildCommenterNamesMap(array $posts): array
    {
        $commentUuids = [];
        foreach ($posts as $post) {
            foreach ($post->getComments() as $comment) {
                $uuid = $comment->getCommenterUuid();
                if ($uuid && !str_starts_with($uuid, 'guest_')) {
                    $commentUuids[] = $uuid;
                }
            }
        }

        return $this->fetchUserNamesByUuid(array_values(array_unique($commentUuids)));
    }

    /**
     * @param array<int, \App\Entity\Post> $posts
     */
    private function buildUserReactionMap(array $posts): array
    {
        $user = $this->getUser();
        if (!$user) {
            return [];
        }

        $postIds = array_values(array_filter(array_map(
            static fn($post) => $post->getId(),
            $posts
        )));

        if (empty($postIds)) {
            return [];
        }

        $reactions = $this->postReactionRepository->findByUserAndPostIds($user->getUuid(), $postIds);

        $map = [];
        foreach ($reactions as $reaction) {
            $map[$reaction->getPost()->getId()] = $reaction->getType();
        }

        return $map;
    }

    private function fetchUserNamesByUuid(array $uuids, string $fallback = 'Membre MuseHub'): array
    {
        if (empty($uuids)) {
            return [];
        }

        $users = $this->userRepository->createQueryBuilder('u')
            ->where('u.uuid IN (:uuids)')
            ->setParameter('uuids', $uuids)
            ->getQuery()
            ->getResult();

        $map = [];
        foreach ($users as $user) {
            $displayName = $user->getUsername() ?: $user->getEmail() ?: $fallback;
            $map[$user->getUuid()] = $displayName;
        }

        return $map;
    }
}
