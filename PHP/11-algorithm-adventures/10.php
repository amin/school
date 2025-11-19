<?php

$actors = [
    ['Christopher Læssø', 1995],
    ['Claes Bang', 1967],
    ['Dominic West', 1969],
    ['Elisabeth Moss', 1982],
    ['Terry Notary', 1968],
];

// TODO: Implement the foreach loop logic here.

foreach ($actors as $actor) {
    [$name, $born] = $actor;
    $decadeBorn = floor((($born / 10)) % 10) * 10;
    echo "$name was born in the $decadeBorn's.";
    echo '<br>';
}

echo '<hr>';

foreach ($actors as $actor) {
    [$name, $born] = $actor;

    switch ($born) {
        case $born >= 1990 && $born < 2000:
            echo "$name was born in the nineties." . '</br>';
            break;
        case $born >= 1960 && $born < 1970:
            echo "$name was born in the sixties." . '</br>';
            break;
        case $born >= 1980 && $born < 1990:
            echo "$name was born in the eighties." . '</br>';
            break;
    }
}
