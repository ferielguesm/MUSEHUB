<?php

namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class StolenCheckService
{
    private const TINEYE_BASE_URL = 'https://tineye.com/search?url=';
    private const HARVARD_BASE_URL = 'https://harvardartmuseums.org/collections?q=';

    public function __construct(
        private UrlGeneratorInterface $router
    ) {
    }

    /**
     * Generates a TinEye reverse image search URL for the artwork.
     * Note: This works best if the artwork image is publicly accessible.
     * If running on localhost, TinEye cannot fetch the image directly, but users can upload it manually on TinEye.
     * We provide the URL search as a convenience for production environments.
     */
    public function getTinEyeUrl(string $imageUrl, string $appBaseUrl): string
    {
        // Ensure we have an absolute URL
        if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            $imageUrl = $appBaseUrl . $imageUrl;
        }

        return self::TINEYE_BASE_URL . urlencode($imageUrl);
    }

    /**
     * Generates a Harvard Art Museums search URL based on the artwork title.
     */
    public function getHarvardSearchUrl(string $title): string
    {
        return self::HARVARD_BASE_URL . urlencode($title);
    }
}
