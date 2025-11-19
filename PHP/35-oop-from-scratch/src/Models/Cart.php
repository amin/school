<?php

declare(strict_types=1);

namespace Amincident\fromScratch\Models;

use Amincident\fromScratch\Models\Product;

class Cart
{
    public function __construct(private array $products = [])
    {
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function removeProduct(string $name): void
    {
        $this->products = array_filter($this->products, fn($product) => $product->getName() !== $name);
    }

    public function getCartItems(): array
    {
        return $this->products;
    }

    public function calculateTotal(): float
    {
        return array_reduce($this->products, fn($totalPrice, $product) => $totalPrice += $product->getPrice(), 0);
    }

    public function emptyCart(): void
    {
        $this->products = [];
    }
}
