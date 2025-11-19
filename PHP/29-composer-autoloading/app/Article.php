<?php

declare(strict_types=1);

namespace App;

use DateTimeImmutable;

class Article
{
    public function __construct(public string $title, public string $content, public DateTimeImmutable $date, public Author $author) {}

    public function getExcerpt(int $numberOfWords): string
    {
        $excerpt = explode(' ', $this->content);
        $excerpt = array_splice($excerpt, 0, $numberOfWords);
        return implode(' ', $excerpt) . '..';
    }
}
