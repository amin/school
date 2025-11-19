<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Person;

try {
    $person = new Person('Jessi Glaser', 18);
    if ($person->age < 18) throw new Exception(sprintf('%s is not allowed to drive.', $person->name));
} catch (Exception $e) {
    echo $e->getMessage();
}
