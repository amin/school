<?php

declare(strict_types=1);

header('Content-Type: application/json');

$vampires = json_decode(file_get_contents(__DIR__ . '/vampires.json'), true) ?? [];

$sortBy = $_GET['sortBy'];
// TODO: Implement the sorting script here.

if (!empty($_GET['sortBy'])) {
    usort($vampires, function ($a, $b) use ($sortBy) {
        return $a[$sortBy] <=> $b[$sortBy];
    });
}

echo json_encode($vampires);
