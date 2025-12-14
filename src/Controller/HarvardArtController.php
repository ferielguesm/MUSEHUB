<?php

namespace App\Controller;

use App\Service\HarvardArtService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HarvardArtController extends AbstractController
{
    #[Route('/harvard-collection', name: 'harvard_collection')]
    public function index(Request $request, HarvardArtService $harvardArtService): Response
    {
        $page = $request->query->getInt('page', 1);
        $data = $harvardArtService->getArtworks($page);

        return $this->render('front/harvard_collection.html.twig', [
            'artworks' => $data['records'] ?? [],
            'info' => $data['info'] ?? [],
            'page' => $page,
        ]);
    }

    /**
     * Provide fallback artwork data when Harvard API is not available
     */
    private function getFallbackArtworks(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Mona Lisa',
                'dated' => '1503-1519',
                'classification' => ['Painting'],
                'description' => 'La Joconde, également connue sous le nom de Mona Lisa, est un tableau de Léonard de Vinci, célèbre pour son sourire énigmatique.',
                'primaryimageurl' => 'https://example.com/mona-lisa.jpg',
                'url' => 'https://en.wikipedia.org/wiki/Mona_Lisa',
                'medium' => 'Huile sur panneau de bois',
                'dimensions' => '77 cm × 53 cm',
                'culture' => 'Italie',
                'department' => 'Peinture',
                'technique' => 'Huile',
                'century' => '16th century',
                'objectnumber' => 'INV123456',
            ],
            [
                'id' => 2,
                'title' => 'La Nuit Étoilée',
                'dated' => '1889',
                'classification' => ['Painting'],
                'description' => 'Une peinture célèbre de Vincent van Gogh représentant un ciel nocturne tourbillonnant au-dessus d\'un village.',
                'primaryimageurl' => 'https://example.com/starry-night.jpg',
                'url' => 'https://en.wikipedia.org/wiki/The_Starry_Night',
                'medium' => 'Huile sur toile',
                'dimensions' => '73.7 cm × 92.1 cm',
                'culture' => 'Pays-Bas',
                'department' => 'Peinture moderne',
                'technique' => 'Huile',
                'century' => '19th century',
                'objectnumber' => 'INV234567',
            ],
            [
                'id' => 3,
                'title' => 'Guernica',
                'dated' => '1937',
                'classification' => ['Painting'],
                'description' => 'Une peinture monumentale de Pablo Picasso représentant les horreurs de la guerre civile espagnole.',
                'primaryimageurl' => 'https://example.com/guernica.jpg',
                'url' => 'https://en.wikipedia.org/wiki/Guernica_(Picasso)',
                'medium' => 'Huile sur toile',
                'dimensions' => '349.3 cm × 776.6 cm',
                'culture' => 'Espagne',
                'department' => 'Art moderne',
                'technique' => 'Huile',
                'century' => '20th century',
                'objectnumber' => 'INV345678',
            ],
            [
                'id' => 4,
                'title' => 'La Persistance de la Mémoire',
                'dated' => '1931',
                'classification' => ['Painting'],
                'description' => 'Une peinture surréaliste célèbre de Salvador Dalí représentant des montres molles.',
                'primaryimageurl' => 'https://example.com/persistence-of-memory.jpg',
                'url' => 'https://en.wikipedia.org/wiki/The_Persistence_of_Memory',
                'medium' => 'Huile sur toile',
                'dimensions' => '33 cm × 24 cm',
                'culture' => 'Espagne',
                'department' => 'Art surréaliste',
                'technique' => 'Huile',
                'century' => '20th century',
                'objectnumber' => 'INV456789',
            ],
            [
                'id' => 5,
                'title' => 'Les Demoiselles d\'Avignon',
                'dated' => '1907',
                'classification' => ['Painting'],
                'description' => 'Une peinture cubiste révolutionnaire de Pablo Picasso marquant le début du cubisme.',
                'primaryimageurl' => 'https://example.com/demoiselles-avignon.jpg',
                'url' => 'https://en.wikipedia.org/wiki/Les_Demoiselles_d%27Avignon',
                'medium' => 'Huile sur toile',
                'dimensions' => '243.9 cm × 233.7 cm',
                'culture' => 'Espagne',
                'department' => 'Art moderne',
                'technique' => 'Huile',
                'century' => '20th century',
                'objectnumber' => 'INV567890',
            ],
            [
                'id' => 6,
                'title' => 'Le Cri',
                'dated' => '1893',
                'classification' => ['Painting'],
                'description' => 'Une peinture expressionniste célèbre d\'Edvard Munch représentant une figure hurlante.',
                'primaryimageurl' => 'https://example.com/the-scream.jpg',
                'url' => 'https://en.wikipedia.org/wiki/The_Scream',
                'medium' => 'Huile, tempera et pastel sur carton',
                'dimensions' => '91 cm × 73.5 cm',
                'culture' => 'Norvège',
                'department' => 'Art expressionniste',
                'technique' => 'Huile et tempera',
                'century' => '19th century',
                'objectnumber' => 'INV678901',
            ]
        ];
    }
}
