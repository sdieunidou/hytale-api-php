# Hytale API Client (PHP 8.4)

A modern PHP client library for interacting with the (unofficial) Hytale Web API.

## Requirements

- PHP 8.4 (Compatible with 8.3)
- Composer

## Installation

```bash
composer install
```

## Usage

```php
use Hytale\HytaleClient;

$client = new HytaleClient();
$posts = $client->getBlogPosts();

foreach ($posts as $post) {
    echo $post['title'] . "\n";
}
```

## Features Used

- **PHP 8.2+ Readonly Classes**: The client is immutable.
- **PHP 8.3 Typed Constants**: For robust configuration.
- **Constructor Property Promotion**: For cleaner code.

## Disclaimer

This library uses unofficial endpoints found on the Hytale website. They may change at any time.
