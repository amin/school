<?php


require_once __DIR__ . '/bootstrap.php';

$employee = new Employee('Susan Johansson');

$employee->setYearlySalary(684000);

printf(
    '%s earns %d kr a month at Yrgo',
    $employee->name,
    $employee->getMonthlySalary(),
);
