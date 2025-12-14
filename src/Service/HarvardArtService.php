<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HarvardArtService
{
    private const BASE_URL = 'https://api.harvardartmuseums.org';

    public function __construct(
        private HttpClientInterface $httpClient,
        private string $apiKey
    ) {
    }

    public function getArtworks(int $page = 1, int $limit = 12): array
    {
        $response = $this->httpClient->request('GET', self::BASE_URL . '/object', [
            'query' => [
                'apikey' => $this->apiKey,
                'page' => $page,
                'size' => $limit,
                'hasimage' => 1, // Only get artworks with images
                'sort' => 'rank', // Use rank for consistent quality results
                'sortorder' => 'desc',
            ]
        ]);

        return $response->toArray();
    }

    public function searchArtworks(string $title): array
    {
        $response = $this->httpClient->request('GET', self::BASE_URL . '/object', [
            'query' => [
                'apikey' => $this->apiKey,
                'title' => $title,
                'hasimage' => 1,
                'size' => 5, // Limit to top 5 matches
                'sort' => 'rank',
                'sortorder' => 'desc',
            ]
        ]);

        return $response->toArray();
    }
}
