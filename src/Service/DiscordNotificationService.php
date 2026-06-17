<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class DiscordNotificationService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private LoggerInterface $logger,
        private string $discordWebhookUrl
    ) {}

    public function sendNotification(string $message): void
    {
        if (empty($this->discordWebhookUrl)) {
            return;
        }

        try {
            $this->httpClient->request('POST', $this->discordWebhookUrl, [
                'json' => [
                    'content' => $message,
                    'username' => 'MuseHub Bot',
                    'avatar_url' => 'https://i.imgur.com/4M34hi2.png', // Optional: Add a bot avatar
                ],
            ]);
        } catch (\Exception $e) {
            $this->logger->error('Failed to send Discord notification: ' . $e->getMessage());
        }
    }
}
