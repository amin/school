<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

$employee = new Employee('Marie Eklöv');
$employee->title = 'Principal';


printf(
    '%s is the %s at Yrgo',
    $employee->name,
    $employee->title,
);
