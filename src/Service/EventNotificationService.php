<?php

namespace App\Service;

use App\Entity\Event;
use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;
use Psr\Log\LoggerInterface;

/**
 * Service de notification par email pour les événements
 */
class EventNotificationService
{
    public function __construct(
        private MailerInterface $mailer,
        private Environment $twig,
        private LoggerInterface $logger
    ) {}

    /**
     * Envoyer un email de confirmation d'inscription à un événement
     */
    public function sendRegistrationConfirmation(Event $event, User $user): void
    {
        try {
            $email = (new Email())
                ->from('noreply@musehub.com')
                ->to($user->getEmail())
                ->subject('Confirmation d\'inscription - ' . $event->getTitle())
                ->html($this->twig->render('emails/event_registration.html.twig', [
                    'event' => $event,
                    'user' => $user,
                ]));

            $this->mailer->send($email);

            $this->logger->info('Email de confirmation envoyé', [
                'event_id' => $event->getId(),
                'user_email' => $user->getEmail(),
            ]);

        } catch (\Exception $e) {
            $this->logger->error('Erreur envoi email confirmation événement', [
                'error' => $e->getMessage(),
                'event_id' => $event->getId(),
                'user_email' => $user->getEmail(),
            ]);
            throw $e;
        }
    }

    /**
     * Send email when participant is accepted to an event
     */
    public function sendAcceptanceNotification(Event $event, User $user): void
    {
        try {
            $email = (new Email())
                ->from('noreply@musehub.com')
                ->to($user->getEmail())
                ->subject('✅ Votre participation a été acceptée - ' . $event->getTitle())
                ->html($this->twig->render('emails/event_acceptance.html.twig', [
                    'event' => $event,
                    'user' => $user,
                ]));

            $this->mailer->send($email);

            $this->logger->info('Email d\'acceptation envoyé', [
                'event_id' => $event->getId(),
                'user_email' => $user->getEmail(),
            ]);

        } catch (\Exception $e) {
            $this->logger->error('Erreur envoi email acceptation événement', [
                'error' => $e->getMessage(),
                'event_id' => $event->getId(),
                'user_email' => $user->getEmail(),
            ]);
            // Don't throw - email failure shouldn't block the acceptance
        }
    }

    /**
     * Send email when participant is rejected from an event
     */
    public function sendRejectionNotification(Event $event, User $user): void
    {
        try {
            $email = (new Email())
                ->from('noreply@musehub.com')
                ->to($user->getEmail())
                ->subject('Mise à jour de votre participation - ' . $event->getTitle())
                ->html($this->twig->render('emails/event_rejection.html.twig', [
                    'event' => $event,
                    'user' => $user,
                ]));

            $this->mailer->send($email);

            $this->logger->info('Email de refus envoyé', [
                'event_id' => $event->getId(),
                'user_email' => $user->getEmail(),
            ]);

        } catch (\Exception $e) {
            $this->logger->error('Erreur envoi email refus événement', [
                'error' => $e->getMessage(),
                'event_id' => $event->getId(),
                'user_email' => $user->getEmail(),
            ]);
            // Don't throw - email failure shouldn't block the rejection
        }
    }
}
