<?php

namespace App\Controller;

use App\Service\ChatbotService;
use App\Service\NotificationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ChatbotController extends AbstractController
{
    public function __construct(
        private ChatbotService $chatbotService,
        private NotificationService $notificationService
    ) {}

    #[Route('/api/chatbot/message', name: 'api_chatbot_message', methods: ['POST'])]
    public function message(Request $request): JsonResponse
    {
        try {
            $content = $request->getContent();
            $data = json_decode($content, true);

            // Debug logging
            error_log('Chatbot API called with data: ' . print_r($data, true));

            if (json_last_error() !== JSON_ERROR_NONE) {
                return $this->json([
                    'response' => 'Désolé, j\'ai eu du mal à comprendre votre message. Essayez de reformuler votre question.',
                    'type' => 'error',
                    'escalated' => false,
                    'suggestions' => ['/help', '/rules']
                ], 200);
            }

            if (!isset($data['message'])) {
                return $this->json([
                    'response' => 'Il semble que votre message n\'a pas été envoyé correctement. Essayez à nouveau.',
                    'type' => 'error',
                    'escalated' => false,
                    'suggestions' => ['/help']
                ], 200);
            }

            $user = $this->getUser();
            $userId = $user ? $user->getUuid() : null;
            $message = trim($data['message']);

            if (empty($message)) {
                return $this->json([
                    'response' => 'Votre message semble vide. Pouvez-vous me dire quelque chose ?',
                    'type' => 'empty',
                    'escalated' => false,
                    'suggestions' => ['/help', '/rules', '/categories']
                ], 200);
            }

            // Process the message
            $response = $this->chatbotService->processMessage($message, $userId);

            // Check if message needs moderator escalation
            if ($this->chatbotService->needsModeratorEscalation($message)) {
                try {
                    // Create notification for moderators
                    $this->notificationService->createModeratorEscalationNotification(
                        $userId,
                        $message,
                        'Chatbot escalation: User reported an issue requiring moderator attention'
                    );
                    $response['escalated'] = true;
                    $response['response'] .= "\n\n🚨 Un modérateur a été notifié et vous contactera bientôt.";
                } catch (\Exception $e) {
                    error_log('Failed to create escalation notification: ' . $e->getMessage());
                    // Don't fail the whole response if notification creation fails
                }
            }

            return $this->json([
                'response' => $response['response'] ?? 'Désolé, je n\'arrive pas à traiter votre demande pour le moment.',
                'type' => $response['type'] ?? 'unknown',
                'escalated' => $response['escalated'] ?? false,
                'suggestions' => $response['suggestions'] ?? [],
            ], 200);

        } catch (\Exception $e) {
            error_log('Chatbot API error: ' . $e->getMessage());
            return $this->json([
                'response' => 'Une erreur inattendue s\'est produite. Veuillez réessayer dans quelques instants.',
                'type' => 'error',
                'escalated' => false,
                'suggestions' => ['/help']
            ], 200);
        }
    }

    #[Route('/api/chatbot/welcome', name: 'api_chatbot_welcome', methods: ['GET'])]
    public function welcome(): JsonResponse
    {
        return $this->json([
            'message' => $this->chatbotService->getWelcomeMessage(),
            'type' => 'welcome',
        ]);
    }

    #[Route('/chatbot', name: 'chatbot_interface', methods: ['GET'])]
    public function interface(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('chatbot/index.html.twig');
    }
}
