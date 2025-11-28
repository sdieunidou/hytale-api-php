<?php

require __DIR__ . '/vendor/autoload.php';

use Hytale\HytaleClient;

try {
    $client = new HytaleClient();
    echo "Fetching latest Hytale blog posts...\n";

    $posts = $client->getBlogPosts();

    foreach (array_slice($posts, 0, 5) as $post) {
        echo sprintf("- %s (%s)\n", $post['title'] ?? 'No Title', $post['publishedAt'] ?? 'Unknown Date');
        echo sprintf("  https://hytale.com/news/%s/%s\n", \date('Y/m', \strtotime($post['publishedAt'])), $post['slug']);
        echo "\n";
    }

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
