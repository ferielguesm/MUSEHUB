<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Service for Isso commenting system integration
 * Isso is a lightweight, privacy-focused commenting system
 */
class IssoService
{
    private string $baseUrl;

    public function __construct(
        private HttpClientInterface $httpClient,
        private LoggerInterface $logger,
        string $issoUrl = ''
    ) {
        $this->baseUrl = rtrim($issoUrl, '/');
    }

    /**
     * Check if Isso is configured
     */
    public function isConfigured(): bool
    {
        return !empty($this->baseUrl);
    }

    /**
     * Get comments for a thread (post)
     */
    public function getComments(string $threadUri, int $limit = 50): array
    {
        if (!$this->isConfigured()) {
            return [];
        }

        try {
            $response = $this->httpClient->request('GET', $this->baseUrl . '/id', [
                'query' => [
                    'uri' => $threadUri,
                    'limit' => $limit,
                ],
            ]);

            $data = $response->toArray();
            return $data['replies'] ?? [];
        } catch (\Exception $e) {
            $this->logger->error('Failed to fetch Isso comments', [
                'error' => $e->getMessage(),
                'thread_uri' => $threadUri,
            ]);
            return [];
        }
    }

    /**
     * Create a new comment
     */
    public function createComment(string $threadUri, string $text, ?string $author = null, ?string $email = null, ?int $parent = null): ?array
    {
        if (!$this->isConfigured()) {
            return null;
        }

        try {
            $payload = [
                'text' => $text,
            ];

            if ($author) {
                $payload['author'] = $author;
            }

            if ($email) {
                $payload['email'] = $email;
            }

            if ($parent) {
                $payload['parent'] = $parent;
            }

            $response = $this->httpClient->request('POST', $this->baseUrl . '/new', [
                'query' => ['uri' => $threadUri],
                'json' => $payload,
            ]);

            return $response->toArray();
        } catch (\Exception $e) {
            $this->logger->error('Failed to create Isso comment', [
                'error' => $e->getMessage(),
                'thread_uri' => $threadUri,
            ]);
            return null;
        }
    }

    /**
     * Get comment count for a thread
     */
    public function getCommentCount(string $threadUri): int
    {
        if (!$this->isConfigured()) {
            return 0;
        }

        try {
            $response = $this->httpClient->request('GET', $this->baseUrl . '/count', [
                'query' => ['uri' => $threadUri],
            ]);

            $data = $response->toArray();
            return $data[0] ?? 0;
        } catch (\Exception $e) {
            $this->logger->error('Failed to fetch Isso comment count', [
                'error' => $e->getMessage(),
                'thread_uri' => $threadUri,
            ]);
            return 0;
        }
    }

    /**
     * Get Isso embed script URL
     */
    public function getEmbedScriptUrl(): string
    {
        return $this->baseUrl . '/js/embed.min.js';
    }

    /**
     * Generate Isso embed HTML
     */
    public function getEmbedHtml(string $threadUri, string $threadTitle = ''): string
    {
        if (!$this->isConfigured()) {
            return '';
        }

        $dataAttrs = sprintf('data-isso="%s" data-isso-id="%s"', 
            htmlspecialchars($this->baseUrl),
            htmlspecialchars($threadUri)
        );

        if ($threadTitle) {
            $dataAttrs .= sprintf(' data-title="%s"', htmlspecialchars($threadTitle));
        }

        return sprintf(
            '<script src="%s" %s></script><section id="isso-thread"></section>',
            htmlspecialchars($this->getEmbedScriptUrl()),
            $dataAttrs
        );
    }

    /**
     * Check if Isso server is reachable
     */
    public function ping(): bool
    {
        if (!$this->isConfigured()) {
            return false;
        }

        try {
            $response = $this->httpClient->request('GET', $this->baseUrl . '/');
            return $response->getStatusCode() === 200;
        } catch (\Exception $e) {
            $this->logger->warning('Isso server not reachable', [
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }
}
