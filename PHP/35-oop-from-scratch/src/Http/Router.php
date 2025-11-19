<?php

declare(strict_types=1);

namespace Amincident\fromScratch\Http;

class Router
{
    public function __construct(private array $routes)
    {
    }

    public function direct(string $uri): string
    {
        return $this->routes[$uri];
    }
}
