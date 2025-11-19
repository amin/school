<?php

declare(strict_types=1);

$database = new PDO('sqlite:../startrek.db');

// TODO: Implement the database logic here.

$actorId = $database->quote($_GET['id']) ?? '';

if (!empty($actorId)) {
    $database->exec("DELETE FROM characters WHERE id = $actorId");
    header('Location: /05/index.php');
}
