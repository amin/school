<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Person;

$person = new Person('Jay Bilzerian', 17);

if ($jay->age < 18) {
    throw new Exception(sprintf('%s is not old enough to drive', $person->name));
}
