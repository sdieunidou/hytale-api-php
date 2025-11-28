<?php

declare(strict_types=1);

namespace Hytale\Tests;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Hytale\HytaleClient;
use PHPUnit\Framework\TestCase;

class HytaleClientTest extends TestCase
{
    public function testGetBlogPostsReturnsArray(): void
    {
        // Mock the Guzzle Client
        $mockClient = $this->createMock(ClientInterface::class);

        // Define expected response
        $mockBody = json_encode([
            ['title' => 'Test Post', 'slug' => 'test-post']
        ]);

        $mockClient->method('request')
            ->willReturn(new Response(200, [], $mockBody));

        $client = new HytaleClient($mockClient);
        $posts = $client->getBlogPosts();

        $this->assertIsArray($posts);
        $this->assertCount(1, $posts);
        $this->assertSame('Test Post', $posts[0]['title']);
    }

    public function testGetBlogPostReturnsArray(): void
    {
         // Mock the Guzzle Client
         $mockClient = $this->createMock(ClientInterface::class);

         // Define expected response
         $mockBody = json_encode(['title' => 'Single Post', 'slug' => 'single-post']);

         $mockClient->method('request')
             ->with('GET', 'blog/post/slug/single-post')
             ->willReturn(new Response(200, [], $mockBody));

         $client = new HytaleClient($mockClient);
         $post = $client->getBlogPost('single-post');

         $this->assertIsArray($post);
         $this->assertSame('Single Post', $post['title']);
    }
}
