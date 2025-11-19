<?php

session_start();

require_once __DIR__ . '/db.php';

$movie = $_POST['movie'] ?? '';

$stmt = $db->prepare('
SELECT movies.title, movies.tmdb_url, movies.image_url, (directors.first_name || " " || directors.last_name) as director FROM movies
INNER JOIN directors
ON movies.director_id = directors.id
WHERE title LIKE :movie');
$stmt->bindValue(':movie', "%{$movie}%");
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['results'] = $results;

header('Location: ' . $_SERVER['HTTP_REFERER']);
