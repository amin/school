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
    $age = date('Y') - $born;

    if ($age >= 30 && $age < 40) {
        echo "$name is in his/hers thirties." . '</br>';
    }

    if ($age >= 40 && $age < 50) {
        echo "$name is in his/hers fourties." . '</br>';
    }

    if ($age >= 50 && $age < 60) {
        echo "$name is in his/hers fifties." . '</br>';
    }
}
