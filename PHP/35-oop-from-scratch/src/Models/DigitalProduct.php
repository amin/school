<?php

declare(strict_types=1);

namespace Amincident\fromScratch\Models;

class DigitalProduct extends Product
{
    public function __construct(string $name, float $price, protected string $link, protected $downloadable = false)
    {
        return parent::__construct($name, $price);
    }
}
