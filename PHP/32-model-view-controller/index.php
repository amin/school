<?php

declare(strict_types=1);

use App\Http\Request;
use App\Http\Router;

require_once __DIR__ . '/bootstrap.php';

$router = new Router([
    '/' => __DIR__ . '/controllers/pokedex.php',
    '/pokemon' => __DIR__ . '/controllers/pokemon.php',
]);

try {
    require $router->direct(Request::uri());
} catch (Throwable $e) {
    echo $e->getMessage();
}
