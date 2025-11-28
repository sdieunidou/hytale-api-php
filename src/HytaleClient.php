<?php

declare(strict_types=1);

namespace Hytale;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

readonly class HytaleClient
{
    // PHP 8.3 Typed Constants
    public const string BASE_URI = 'https://hytale.com/api/';

    public function __construct(
        // Constructor Property Promotion
        private ClientInterface $client = new Client(['base_uri' => self::BASE_URI]),
    ) {}

    /**
     * Fetches the latest blog posts.
     *
     * @return array<mixed>
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBlogPosts(): array
    {
        $response = $this->client->request('GET', 'blog/post/published');
        $content = $response->getBody()->getContents();

        return json_decode($content, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * Fetches a single blog post by its slug.
     *
     * @param string $slug
     * @return array<mixed>
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBlogPost(string $slug): array
    {
        // Note: The specific endpoint for a single post is inferred from the unofficial API patterns
        $response = $this->client->request('GET', "blog/post/slug/{$slug}");
        $content = $response->getBody()->getContents();

        return json_decode($content, true, 512, JSON_THROW_ON_ERROR);
    }
}
