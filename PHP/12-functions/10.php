<?php

declare(strict_types=1);

$emojis = [
    'joy' => '😂',
    'rage' => '😡',
    'scream' => '😱',
    'shit' => '💩',
    'smirk' => '😏',
    'sunglasses' => '😎',
    'thumbsdown' => '👎',
    'thumbsup' => '👍',
    'unicorn' => '🦄',

];


function searchEmojis(string $query, array $emojis): array
{
    $matches = [];
    $queryLower = strtolower($query);

    foreach ($emojis as $key => $emoji) {
        if (str_contains(strtolower($key), $queryLower)) {
            $matches[$key] = $emoji;
        }
    }

    return $matches;
}


print_r(searchEmojis('thumb', $emojis));
