<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Person;
use App\HormoneMonster;

$person = new Person('Nick Birch', 13);

try {
    $person->addHormoneMonster(new HormoneMonster('Maury'));
    printf('%s hormone monster is %s', $person->name, $person->monster->name);
} catch (Exception $e) {
    echo $e->getMessage();
}
