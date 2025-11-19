<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

use Amincident\fromScratch\Http\Request;
use Amincident\fromScratch\Http\Router;
use Amincident\fromScratch\Models\Cart;
use Amincident\fromScratch\Models\PhysicalProduct;
use Amincident\fromScratch\Models\DigitalProduct;

try {
    $router = new Router([
        '/' => __DIR__ . '/controllers/index.controller.php'
    ]);

    $cart = new Cart();
    $cart->addProduct(new PhysicalProduct(
        name: 'iPhone 16',
        price: 799.00,
        dimensions: ['length' => 15, 'width' => 9, 'height' => 2],
        weight: 0.17
    ));

    $cart->addProduct(new DigitalProduct(
        name: 'Windows 12',
        price: 399.00,
        link: 'https://download.microsoft.com/windows-12.iso'
    ));

    require $router->direct(Request::uri());
} catch (Throwable $e) {
    echo $e->getMessage();
}
