<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Notification;
use App\Repository\OffreRepository;
use App\Repository\ListingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/marketplace/offers')]
#[IsGranted('ROLE_USER')]
class OfferManagementController extends AbstractController
{
    public function __construct(
        private OffreRepository $offreRepository,
        private ListingRepository $listingRepository,
        private EntityManagerInterface $em
    ) {}

    /**
     * View my sent offers (as buyer)
     */
    #[Route('/my-offers', name: 'marketplace_my_offers', methods: ['GET'])]
    public function myOffers(): Response
    {
        $user = $this->getUser();
        $offers = $this->offreRepository->findBy(
            ['utilisateur' => $user],
            ['datePropose' => 'DESC']
        );

        return $this->render('marketplace/my_offers.html.twig', [
            'offers' => $offers,
        ]);
    }

    /**
     * View offers received on my listings (as seller)
     */
    #[Route('/received', name: 'marketplace_received_offers', methods: ['GET'])]
    public function receivedOffers(): Response
    {
        $user = $this->getUser();
        
        // Get all listings where artwork belongs to current user
        $listings = $this->listingRepository->createQueryBuilder('l')
            ->where('l.artworkUuid LIKE :userUuid')
            ->setParameter('userUuid', $user->getUuid() . '%')
            ->getQuery()
            ->getResult();

        // Get all offers for these listings
        $offers = [];
        foreach ($listings as $listing) {
            $listingOffers = $this->offreRepository->findBy(
                ['listing' => $listing],
                ['datePropose' => 'DESC']
            );
            foreach ($listingOffers as $offer) {
                $offers[] = [
                    'offer' => $offer,
                    'listing' => $listing,
                ];
            }
        }

        return $this->render('marketplace/received_offers.html.twig', [
            'offers' => $offers,
        ]);
    }

    /**
     * Accept an offer
     */
    #[Route('/{id}/accept', name: 'marketplace_offer_accept', methods: ['POST'])]
    public function acceptOffer(int $id, Request $request): Response
    {
        $offer = $this->offreRepository->find($id);
        
        if (!$offer) {
            $this->addFlash('error', 'Offre introuvable.');
            return $this->redirectToRoute('marketplace_received_offers');
        }

        $listing = $offer->getListing();
        $user = $this->getUser();

        // Verify that the listing belongs to the current user
        if (!str_starts_with($listing->getArtworkUuid(), $user->getUuid())) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à accepter cette offre.');
            return $this->redirectToRoute('marketplace_received_offers');
        }

        // Update offer status
        $offer->setStatut('Acceptée');
        
        // Create notification for buyer
        $notification = new Notification();
        $notification->setRecipientUuid($offer->getUtilisateur()->getUuid());
        $notification->setActorUuid($user->getUuid());
        $notification->setType(Notification::TYPE_OFFER_ACCEPTED);
        $notification->setMessage("Votre offre de {$offer->getPrixPropose()}€ a été acceptée !");
        $notification->setMetadata([
            'offer_id' => $offer->getId(),
            'listing_id' => $listing->getId(),
            'price' => $offer->getPrixPropose(),
        ]);

        $this->em->persist($notification);
        $this->em->flush();

        $this->addFlash('success', 'Offre acceptée ! L\'acheteur a été notifié.');
        return $this->redirectToRoute('marketplace_received_offers');
    }

    /**
     * Reject an offer
     */
    #[Route('/{id}/reject', name: 'marketplace_offer_reject', methods: ['POST'])]
    public function rejectOffer(int $id, Request $request): Response
    {
        $offer = $this->offreRepository->find($id);
        
        if (!$offer) {
            $this->addFlash('error', 'Offre introuvable.');
            return $this->redirectToRoute('marketplace_received_offers');
        }

        $listing = $offer->getListing();
        $user = $this->getUser();

        // Verify that the listing belongs to the current user
        if (!str_starts_with($listing->getArtworkUuid(), $user->getUuid())) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à refuser cette offre.');
            return $this->redirectToRoute('marketplace_received_offers');
        }

        // Update offer status
        $offer->setStatut('Refusée');
        
        // Create notification for buyer
        $notification = new Notification();
        $notification->setRecipientUuid($offer->getUtilisateur()->getUuid());
        $notification->setActorUuid($user->getUuid());
        $notification->setType(Notification::TYPE_OFFER_REJECTED);
        $notification->setMessage("Votre offre de {$offer->getPrixPropose()}€ a été refusée.");
        $notification->setMetadata([
            'offer_id' => $offer->getId(),
            'listing_id' => $listing->getId(),
            'price' => $offer->getPrixPropose(),
        ]);

        $this->em->persist($notification);
        $this->em->flush();

        $this->addFlash('info', 'Offre refusée. L\'acheteur a été notifié.');
        return $this->redirectToRoute('marketplace_received_offers');
    }
}
