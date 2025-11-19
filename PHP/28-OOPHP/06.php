<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

try {
    $server = new Server('Webbutvecklare', [
        new Channel('backend', 'text'),
        new Channel('frontend', 'editor'),
    ]);
} catch (Exception $e) {
    echo $e->getMessage();
}
