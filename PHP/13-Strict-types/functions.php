<?php

declare(strict_types=1);

function sayHelloTo(string $name): string
{
    return "Hello, $name!";
}

function getMovieDescription(string $title, string $director, int $year): string
{
    return "The movie $title was released $year and directed by $director.";
}

function getFirstChar(string $value): string
{
    return substr($value, 0, 1);
}

function getStringsLength(array $values): array
{
    // $arrayValueLength = [];
    // foreach ($values as $value) {
    //     $arrayValueLength[] = strlen($value);
    // }
    // return $arrayValueLength;

    return array_map(fn($string) => strlen($string), $values);
}

function getBlock(int $index): string
{
    $blocks = [
        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAACQkWg2AAAAFUlEQVR4AWPI7vlPEhrGGkY1jGoAAEwQ9hBqU6EFAAAAAElFTkSuQmCC',
        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAgMAAABinRfyAAAACVBMVEXnWhD31rUAAABagmvSAAAANklEQVR4AWMQDU0MYXBgUGFCIdRAhNIKIKEahi67gGECE0MUiHBd5QAUCwMRTA5cDForslYAAKVzDEjCrcCGAAAAAElFTkSuQmCC',
        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAACQkWg2AAAALElEQVR4AWP4fm0rSYjheZQAJmJgwClOogZyAH5TMcXpoIFUQJtgHY0HUgEAQR/y28nnCdAAAAAASUVORK5CYII=',
        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAgMAAABinRfyAAAADFBMVEVrjP/nWhD/pUIAAABg5DuiAAAAQElEQVR4AWMQDQ0NYchatWo1Q96qVbsZsqZGrWbIir8GJOKmw4h94UBiZT2IqAISq36BWFlgLkjbr90QA/4DAQBLbyVGZjjebAAAAABJRU5ErkJggg==',
    ];

    // TODO: Implement function exercise 5 with type declarations.

    return $blocks[$index];
}

function getQuote(int $index): string
{
    $quotes = [
        'Different things can be sad... it\'s not all war!',
        'I want you to be the very best version of yourself that you can be.',
        'People go by the names their parents give them, but they don\'t believe in God.',
        'Some people aren\'t built happy, you know.',
        'The only thing exciting about 2002 is that it\'s a palindrome.',
    ];

    return isset($quotes[$index]) ? $quotes[$index] : "Quote $index not found.";
}

function getRandomQuote(): string
{
    $quotes = [
        'Different things can be sad... it\'s not all war!',
        'I want you to be the very best version of yourself that you can be.',
        'People go by the names their parents give them, but they don\'t believe in God.',
        'Some people aren\'t built happy, you know.',
        'The only thing exciting about 2002 is that it\'s a palindrome.',
    ];

    // TODO: Implement function exercise 7 with type declarations.

    return $quotes[array_rand($quotes)];
}

function getMap(int $width, int $height): array
{

    $map = [];

    for ($i = 0; $i < $height; $i++) {
        $map[$i] = $i === $height - 1 ? array_fill(0, $width, 1) : array_fill(0, $width, 0);
    }

    return $map;
}
