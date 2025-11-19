<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Amincident\fromScratch\Models\Cart;
use Amincident\fromScratch\Models\DigitalProduct;

class CartTest extends TestCase
{
    public function test_add_to_cart()
    {
        $cart = new Cart();
        $product = new DigitalProduct('Microsoft Office', 3999, 'https://download.office.com/office');
        $cart->addProduct($product);

        $this->assertSame($product, $cart->getCartItems()[0]);
    }
}
