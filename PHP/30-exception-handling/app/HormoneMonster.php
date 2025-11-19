<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\InvalidNameException;

class HormoneMonster
{
    private static array $monsters = [
        'Bob',
        'Connie',
        'Gavin',
        'Lorraine',
        'Maury',
        'Mona',
        'Rick',
        'Stan',
        'Tyler'
    ];

    public function __construct(public string $name)
    {
        if (!in_array($name, HormoneMonster::$monsters))
            throw new InvalidNameException(
                sprintf('%s is not what you name a hormone monster.', $name)
            );
    }
}
