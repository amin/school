<?php
$database = new PDO('sqlite:../tmdb.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // TODO: Implement the database update logic here.

    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $tmdbUrl = trim($_POST['tmdb_url']);
    $biography = trim($_POST['biography']);
    $id = trim($_POST['id']);


    $stmt = $database->prepare('
        UPDATE directors SET
        first_name = :first_name,
        last_name = :last_name,
        biography = :biography,
        tmdb_url = :tmdb_url
        WHERE id = :id
        ');

    $stmt->bindParam('first_name', $firstName);
    $stmt->bindParam('last_name', $lastName);
    $stmt->bindParam('biography', $biography);
    $stmt->bindParam('tmdb_url', $tmdbUrl);
    $stmt->bindParam('id', $id);

    $stmt->execute();

    header("Location: " . $_SERVER['HTTP_REFERER']);
}
