<?php

declare(strict_types=1);

namespace App;

class Episode
{

    public array $characters = [];
    public function __construct(public string $name) {}

    public function addCharacter(Character $character): Episode
    {
        $this->characters[] = $character;
        return $this;
    }
}
