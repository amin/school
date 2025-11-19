<?php

declare(strict_types=1);

use App\Http\Request;
use App\Http\Router;

use App\Exceptions\NotFoundHttpException;

require_once __DIR__ . '/bootstrap.php';

$router = new Router([
    '/' => __DIR__ . '/controllers/pokedex.php',
    '/pokemon' => __DIR__ . '/controllers/pokemon.php',
]);

try {
    require $router->direct(Request::uri());
} catch (NotFoundHttpException $e) {
    require __DIR__ . '/views/404.view.php';
} catch (Exception $e) {
    echo $e->getMessage();
}
