<?php

namespace App\Service;

use App\Entity\Transaction;
use App\Repository\TransactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Psr\Log\LoggerInterface;

class StripePaymentService
{
    public function __construct(
        private string $stripeSecretKey,
        private EntityManagerInterface $em,
        private TransactionRepository $transactionRepository,
        private LoggerInterface $logger
    ) {
        Stripe::setApiKey($this->stripeSecretKey);
    }

    public function createArtworkCheckoutSession(
        int $listingId,
        string $listingUuid,
        string $artworkTitle,
        float $price,
        string $buyerUuid,
        string $sellerUuid,
        string $successUrl,
        string $cancelUrl
    ): Session {
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => ['name' => $artworkTitle],
                    'unit_amount' => (int)($price * 100),
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
            'metadata' => [
                'listing_id' => $listingId,
                'listing_uuid' => $listingUuid,
                'buyer_uuid' => $buyerUuid,
                'seller_uuid' => $sellerUuid,
            ],
        ]);

        // Create Pending Transaction
        $transaction = new Transaction();
        $transaction->setBuyerUuid($buyerUuid);
        $transaction->setListingUuid($listingUuid);
        $transaction->setAmount((string)$price);
        $transaction->setStripeSessionId($session->id);
        $transaction->setStatus('pending_payment');
        
        $this->em->persist($transaction);
        $this->em->flush();

        return $session;
    }

    public function completeTransaction(string $sessionId): ?Transaction
    {
        $transaction = $this->transactionRepository->findOneBy(['stripeSessionId' => $sessionId]);
        
        if ($transaction) {
            $transaction->setStatus('paid');
            $this->em->flush();
            $this->logger->info("Transaction {$transaction->getId()} completed for session $sessionId");
        } else {
            $this->logger->error("Transaction not found for session $sessionId");
        }

        return $transaction;
    }

    public function cancelTransaction(string $sessionId): ?Transaction
    {
        $transaction = $this->transactionRepository->findOneBy(['stripeSessionId' => $sessionId]);
        
        if ($transaction) {
            $transaction->setStatus('canceled');
            $this->em->flush();
        }

        return $transaction;
    }
}
