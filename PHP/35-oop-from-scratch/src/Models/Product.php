<?php

declare(strict_types=1);

namespace Amincident\fromScratch\Models;

use InvalidArgumentException;

class Product
{
    public function __construct(protected string $name, protected float $price)
    {
        if ($price <= 0) {
            throw new InvalidArgumentException("Price cannot be less than 0.");
        }
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
