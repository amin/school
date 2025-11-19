<?php

declare(strict_types=1);

namespace App\Http;

use App\Exceptions\NotFoundHttpException;

class Router
{
    public function __construct(public array $routes) {}
    public function direct(string $uri): string
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        if (!array_key_exists($uri, $this->routes))
            throw new NotFoundHttpException();
        return $this->routes[$uri];
    }
}
