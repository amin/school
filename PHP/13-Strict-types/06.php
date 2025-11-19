<?php

declare(strict_types=1);

require __DIR__ . '/functions.php';

echo getQuote(4); // Some people aren't built happy, you know.

echo '</br>';

echo getQuote(6); // Error: quote number 6 does not exist.
