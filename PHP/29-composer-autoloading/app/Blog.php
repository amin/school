<?php

declare(strict_types=1);

namespace App;

class Blog
{
    public function __construct(
        public string $name,
        public array $articles = []
    ) {
    }

    public function addArticle(Article $article): void
    {
        $this->articles[] = $article;
    }
}
