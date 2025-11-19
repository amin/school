<?php

$actors = [
    ['name' => 'Ally Sheedy ', 'year' => 1962],
    ['name' => 'Anthony Michael Hall', 'year' => 1968],
    ['name' => 'Emilio Estevez', 'year' => 1962],
    ['name' => 'Judd Nelson', 'year' => 1959],
    ['name' => 'Molly Ringwald', 'year' => 1968],
];

foreach ($actors as $actor) {
    if ($actor['year'] === 1968) {
        echo $actor['name'] . '<br>';
        break;
    }

    echo $actor['name'] . '<br>';
}
