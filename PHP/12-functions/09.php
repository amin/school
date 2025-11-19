<?php



function getRandomEmoji()
{

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

    return $emojis[array_rand($emojis)];
}

echo getRandomEmoji();
