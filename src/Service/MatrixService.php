<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MatrixService
{
    private string $homeserver;
    private string $accessToken;
    private string $userId;

    public function __construct(
        private HttpClientInterface $httpClient,
        private LoggerInterface $logger,
        string $matrixHomeserver = 'https://matrix.org',
        string $matrixAccessToken = '',
        string $matrixUserId = ''
    ) {
        $this->homeserver = rtrim($matrixHomeserver, '/');
        $this->accessToken = $matrixAccessToken;
        $this->userId = $matrixUserId;
    }

    /**
     * Check if Matrix is configured
     */
    public function isConfigured(): bool
    {
        return !empty($this->homeserver) && !empty($this->accessToken);
    }

    /**
     * Create a new Matrix room
     */
    public function createRoom(string $name, string $topic = '', bool $isPublic = true): ?array
    {
        if (!$this->isConfigured()) {
            $this->logger->warning('Matrix not configured');
            return null;
        }

        try {
            $response = $this->httpClient->request('POST', $this->homeserver . '/_matrix/client/r0/createRoom', [
                'headers' => $this->getHeaders(),
                'json' => [
                    'name' => $name,
                    'topic' => $topic,
                    'visibility' => $isPublic ? 'public' : 'private',
                    'preset' => $isPublic ? 'public_chat' : 'private_chat',
                ],
            ]);

            return $response->toArray();
        } catch (\Exception $e) {
            $this->logger->error('Failed to create Matrix room', [
                'error' => $e->getMessage(),
                'name' => $name,
            ]);
            return null;
        }
    }

    /**
     * Send a message to a room
     */
    public function sendMessage(string $roomId, string $message, string $msgType = 'm.text'): ?array
    {
        if (!$this->isConfigured()) {
            return null;
        }

        try {
            $txnId = uniqid();
            $response = $this->httpClient->request(
                'PUT',
                $this->homeserver . "/_matrix/client/r0/rooms/{$roomId}/send/m.room.message/{$txnId}",
                [
                    'headers' => $this->getHeaders(),
                    'json' => [
                        'msgtype' => $msgType,
                        'body' => $message,
                    ],
                ]
            );

            return $response->toArray();
        } catch (\Exception $e) {
            $this->logger->error('Failed to send Matrix message', [
                'error' => $e->getMessage(),
                'room_id' => $roomId,
            ]);
            return null;
        }
    }

    /**
     * Get messages from a room
     */
    public function getRoomMessages(string $roomId, int $limit = 10): array
    {
        if (!$this->isConfigured()) {
            return [];
        }

        try {
            $response = $this->httpClient->request(
                'GET',
                $this->homeserver . "/_matrix/client/r0/rooms/{$roomId}/messages",
                [
                    'headers' => $this->getHeaders(),
                    'query' => [
                        'dir' => 'b', // backwards from most recent
                        'limit' => $limit,
                    ],
                ]
            );

            $data = $response->toArray();
            return $data['chunk'] ?? [];
        } catch (\Exception $e) {
            $this->logger->error('Failed to fetch Matrix messages', [
                'error' => $e->getMessage(),
                'room_id' => $roomId,
            ]);
            return [];
        }
    }

    /**
     * Invite a user to a room
     */
    public function inviteUser(string $roomId, string $userId): ?array
    {
        if (!$this->isConfigured()) {
            return null;
        }

        try {
            $response = $this->httpClient->request(
                'POST',
                $this->homeserver . "/_matrix/client/r0/rooms/{$roomId}/invite",
                [
                    'headers' => $this->getHeaders(),
                    'json' => [
                        'user_id' => $userId,
                    ],
                ]
            );

            return $response->toArray();
        } catch (\Exception $e) {
            $this->logger->error('Failed to invite user to Matrix room', [
                'error' => $e->getMessage(),
                'room_id' => $roomId,
                'user_id' => $userId,
            ]);
            return null;
        }
    }

    /**
     * Get list of public rooms
     */
    public function getPublicRooms(int $limit = 20): array
    {
        if (!$this->isConfigured()) {
            return [];
        }

        try {
            $response = $this->httpClient->request(
                'GET',
                $this->homeserver . '/_matrix/client/r0/publicRooms',
                [
                    'headers' => $this->getHeaders(),
                    'query' => [
                        'limit' => $limit,
                    ],
                ]
            );

            $data = $response->toArray();
            return $data['chunk'] ?? [];
        } catch (\Exception $e) {
            $this->logger->error('Failed to fetch Matrix public rooms', [
                'error' => $e->getMessage(),
            ]);
            return [];
        }
    }

    /**
     * Get authentication headers for Matrix API
     */
    private function getHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->accessToken,
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * Get Element Web embed URL for a room
     */
    public function getEmbedUrl(string $roomId): string
    {
        return "https://app.element.io/#/room/{$roomId}";
    }
}
