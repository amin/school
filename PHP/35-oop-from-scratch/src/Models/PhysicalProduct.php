<?php

declare(strict_types=1);

namespace Amincident\fromScratch\Models;

use Amincident\fromScratch\Models\Product;
use Exception;

class PhysicalProduct extends Product
{
    public function __construct(string $name, float $price, protected array $dimensions, protected float $weight)
    {
        if (min($dimensions) < 1) {
            throw new Exception('Dimension value cannot be less than 1');
        };
        return parent::__construct($name, $price);
    }
}
