<?php

namespace App\Controller;

use App\Entity\Artwork;
use App\Form\ArtworkType;
use App\Repository\ArtworkRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/my-artworks')]
#[IsGranted('ROLE_USER')]
class ArtworkFrontController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em,
        private ArtworkRepository $artworkRepository,
        private CategoryRepository $categoryRepository,
        private SluggerInterface $slugger
    ) {}

    #[Route('', name: 'my_artworks_list', methods: ['GET'])]
    public function list(): Response
    {
        $user = $this->getUser();
        $artworks = $this->artworkRepository->findBy(
            ['artistUuid' => $user->getUuid()],
            ['id' => 'DESC']
        );

        $stats = [
            'total' => count($artworks),
            'visible' => count(array_filter($artworks, fn($a) => $a->getStatus() === 'visible')),
            'hidden' => count(array_filter($artworks, fn($a) => $a->getStatus() === 'hidden')),
            'totalLikes' => array_sum(array_map(fn($a) => $a->getLikesCount(), $artworks)),
        ];

        return $this->render('front/my_artworks_list.html.twig', [
            'artworks' => $artworks,
            'stats' => $stats,
        ]);
    }

    #[Route('/new', name: 'my_artwork_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $artwork = new Artwork();
        
        // Auto-fill artistUuid with current user's UUID
        $user = $this->getUser();
        if ($user) {
            $artwork->setArtistUuid($user->getUuid());
        }
        
        $form = $this->createForm(ArtworkType::class, $artwork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle file upload
            $imageFile = $form->get('imageFile')->getData();

            if ($imageFile) {
                $newFilename = $this->handleFileUpload($imageFile);
                if ($newFilename) {
                    $artwork->setImageUrl('/uploads/artworks/' . $newFilename);
                }
            }
            
            $this->em->persist($artwork);
            $this->em->flush();

            $this->addFlash('success', '🎨 Œuvre créée avec succès !');
            return $this->redirectToRoute('my_artworks_list');
        }

        return $this->render('front/my_artwork_form.html.twig', [
            'form' => $form->createView(),
            'action' => 'new',
            'artwork' => null,
        ]);
    }

    #[Route('/{id}/edit', name: 'my_artwork_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $artwork = $this->artworkRepository->find($id);
        
        if (!$artwork) {
            throw $this->createNotFoundException('Œuvre non trouvée');
        }

        // Security: only owner can edit
        if ($artwork->getArtistUuid() !== $this->getUser()->getUuid()) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas modifier cette œuvre');
        }

        $form = $this->createForm(ArtworkType::class, $artwork, [
            'is_new' => false
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();

            if ($imageFile) {
                // Delete old image if local
                $oldImageUrl = $artwork->getImageUrl();
                if ($oldImageUrl && strpos($oldImageUrl, '/uploads/artworks/') === 0) {
                    $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $oldImageUrl;
                    if (file_exists($oldImagePath)) {
                        @unlink($oldImagePath);
                    }
                }

                $newFilename = $this->handleFileUpload($imageFile);
                if ($newFilename) {
                    $artwork->setImageUrl('/uploads/artworks/' . $newFilename);
                }
            }

            $this->em->flush();

            $this->addFlash('success', '✅ Œuvre mise à jour avec succès !');
            return $this->redirectToRoute('my_artworks_list');
        }

        return $this->render('front/my_artwork_form.html.twig', [
            'form' => $form->createView(),
            'action' => 'edit',
            'artwork' => $artwork,
        ]);
    }

    #[Route('/{id}/delete', name: 'my_artwork_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $artwork = $this->artworkRepository->find($id);
        
        if (!$artwork) {
            throw $this->createNotFoundException('Œuvre non trouvée');
        }

        // Security: only owner can delete
        if ($artwork->getArtistUuid() !== $this->getUser()->getUuid()) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas supprimer cette œuvre');
        }

        if ($this->isCsrfTokenValid('delete_artwork_' . $id, $request->request->get('_token'))) {
            // Delete image file if local
            $imageUrl = $artwork->getImageUrl();
            if ($imageUrl && strpos($imageUrl, '/uploads/artworks/') === 0) {
                $imagePath = $this->getParameter('kernel.project_dir') . '/public' . $imageUrl;
                if (file_exists($imagePath)) {
                    @unlink($imagePath);
                }
            }

            $this->em->remove($artwork);
            $this->em->flush();

            $this->addFlash('success', '🗑️ Œuvre supprimée avec succès');
        } else {
            $this->addFlash('error', 'Token CSRF invalide');
        }

        return $this->redirectToRoute('my_artworks_list');
    }

    private function handleFileUpload($file): ?string
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

        try {
            $uploadsDir = $this->getParameter('kernel.project_dir') . '/public/uploads/artworks';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }
            $file->move($uploadsDir, $newFilename);
            return $newFilename;
        } catch (FileException $e) {
            $this->addFlash('error', 'Erreur lors de l\'upload de l\'image');
            return null;
        }
    }
}
