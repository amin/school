<?php

declare(strict_types=1);

require __DIR__ . '/functions.php';

$title = 'Lady Bird';
$year = 2017;

$description = getMovieDescription($title, 'Greta Gerwig', $year);

echo $description; // The movie Lady Bird was released 2017 and directed by Greta Gerwig.