<?php

declare(strict_types=1);

namespace App;

use Exception;

class Person
{
    public HormoneMonster $monster;

    public function __construct(public string $name, public int $age) {}

    public function addHormoneMonster(HormoneMonster $monster): void
    {
        if ($this->age < 13) throw new Exception(
            sprintf(
                '%s has to be a teenager before getting a hormone monster.',
                $this->name
            )
        );

        $this->monster = $monster;
    }
}
