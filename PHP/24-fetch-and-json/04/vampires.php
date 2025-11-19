<?php

declare(strict_types=1);

header('Content-type: application/json');
define('VAMPIRE_JSON', __DIR__ . '/vampires.json');

$json = file_get_contents(VAMPIRE_JSON);
$vampires = json_decode($json, true);

function vampireExists(string $name, array $vampires): bool
{
    foreach ($vampires as $vampire) {
        if (strtolower($vampire['name']) === strtolower($name)) return true;
    }
    return false;
}

if (isset($_POST['name'], $_POST['actor'])) {
    // TODO: Implement the add new vampire logic.
    $name = htmlspecialchars(trim($_POST['name']));
    $actor = htmlspecialchars(trim($_POST['actor']));

    if (empty($name) || empty($actor)) {
        http_response_code(400);
        exit(json_encode(['error' => 'All fields required!']));
    }

    if (vampireExists($name, $vampires)) {
        http_response_code(400);
        exit(json_encode(['error' => 'The vampire is not unique!']));
    }

    $vampires[] = ['name' => $name, 'actor' => $actor];
    file_put_contents(VAMPIRE_JSON, json_encode($vampires));
    http_response_code(201);
}


echo json_encode($vampires);
