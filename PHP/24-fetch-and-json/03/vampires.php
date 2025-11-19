<?php

declare(strict_types=1);

// TODO: Implement the JSON output script here.
$json = file_get_contents(__DIR__ . '/vampires.json', true);
header('Content-Type: application/json');

echo $json;
