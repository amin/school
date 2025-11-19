<?php

declare(strict_types=1);

$quote = 'Don\'t be fuckin\' with Harry Potter!';

$newQuote = str_replace('fuckin', 'f**kin', $quote);

print_r($newQuote);
