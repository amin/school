<?php

declare(strict_types=1);

$quote = 'llA smelborp era gnirob litnu er\'yeht ruoy .nwo';
$quote = implode(" ", array_reverse(explode(" ", strrev($quote))));

print_r($quote);
