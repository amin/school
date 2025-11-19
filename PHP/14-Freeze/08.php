<?php

$actors = [
    ['name' => 'Barry Nelson', 'character' => 'Stuart Ullman'],
    ['name' => 'Danny Lloyd', 'character' => 'Danny Torrance'],
    ['name' => 'Jack Nicholson', 'character' => 'Jack Torrance'],
    ['name' => 'Scatman Crothers', 'character' => 'Dick Hallorann'],
    ['name' => 'Shelley Duvall', 'character' => 'Wendy Torrance'],
];

$result = array_filter($actors, function ($actor) {
    if ($actor['name'] !== 'Jack Nicholson') {
        return true;
    }
    return false;
});

//$result = array_filter($actors, fn($actor) => $actor['name'] === 'Jack Nicholson');


echo '<pre>';
print_r($result);
echo '</pre>';
