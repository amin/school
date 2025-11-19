<?php

declare(strict_types=1);

$actors = [
    'Abigail Savage',
    'Adrienne C. Moore',
    'Danielle Brooks',
    'Dascha Polanco',
    'Jackie Cruz',
    'Kate Mulgrew',
    'Kimiko Glenn',
    'Laura Prepon',
    'Lea DeLaria',
    'Michael Harney',
    'Nick Sandow',
    'Selenis Leyva',
    'Taryn Manning',
    'Taylor Schilling',
    'Uzo Aduba',
    'Yael Stone',
];

$filteredActors = array_filter($actors, fn($actor) => str_starts_with($actor, 'K'));
print_r($filteredActors);
