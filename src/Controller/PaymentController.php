<?php

namespace App\Controller;

use App\Repository\ListingRepository;
use App\Service\StripePaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PaymentController extends AbstractController
{
    public function __construct(
        private StripePaymentService $stripePaymentService,
        private ListingRepository $listingRepository
    ) {}

    #[Route('/marketplace/checkout/{id}', name: 'marketplace_checkout', methods: ['POST'])]
    public function checkout(int $id): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('login');
        }

        $listing = $this->listingRepository->find($id);
        if (!$listing) {
            throw $this->createNotFoundException('Annonce introuvable');
        }

        if ($listing->getStock() <= 0) {
            $this->addFlash('error', 'Cette œuvre n\'est plus disponible.');
            return $this->redirectToRoute('marketplace_offer_show', ['id' => $id]);
        }

        $successUrl = $this->generateUrl('payment_success', [], UrlGeneratorInterface::ABSOLUTE_URL);
        $cancelUrl = $this->generateUrl('payment_cancel', [], UrlGeneratorInterface::ABSOLUTE_URL);

        // Get seller UUID (assuming Listing has artistUuid or similar via Artwork or direct)
        // Listing -> Artwork -> ArtistUuid
        $sellerUuid = $listing->getArtwork()->getArtistUuid();
        $buyerUuid = $user->getUuid();

        try {
            $session = $this->stripePaymentService->createArtworkCheckoutSession(
                $listing->getId(),
                $listing->getUuid(),
                $listing->getArtwork()->getTitle(),
                (float)$listing->getPrice(),
                $buyerUuid,
                $sellerUuid,
                $successUrl,
                $cancelUrl
            );

            return $this->redirect($session->url, 303);
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de l\'initialisation du paiement: ' . $e->getMessage());
            return $this->redirectToRoute('marketplace_offer_show', ['id' => $id]);
        }
    }

    #[Route('/payment/success', name: 'payment_success')]
    public function success(): Response
    {
        return $this->render('payment/success.html.twig');
    }

    #[Route('/payment/cancel', name: 'payment_cancel')]
    public function cancel(): Response
    {
        return $this->render('payment/cancel.html.twig');
    }
}
