<?php

$actors = [
    ['Christopher Læssø', 1995],
    ['Claes Bang', 1967],
    ['Dominic West', 1969],
    ['Elisabeth Moss', 1982],
    ['Terry Notary', 1968],
];


foreach ($actors as $actor) {
    [$name, $born] = $actor;

    $decadeBorn = match (true) {
        ($born >= 1990 && $born < 2000) => 'nineties',
        ($born >= 1980 && $born < 1990) => 'eighties',
        ($born >= 1960 && $born < 1970) => 'sixties',
        default => null
    };

    if (is_null($decadeBorn)) {
        echo "Error, unkown decade." . '</br>';
        continue;
    }

    echo "$name was born in the $decadeBorn.";
    echo '<br>';
}
