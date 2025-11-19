<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

$person = new Person('Marie Eklöv');;
echo $person->name;
