<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

$student = new Student('Johannes Tveitan');

$student->addGrades('A');
$student->addGrades('E');

printf(
    'The student %s is graded with the following grades: %s',
    $student->name,
    implode(', ', $student->grades),
);
