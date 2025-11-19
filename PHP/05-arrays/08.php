<?php

$movie = [
    'title' => 'Inception',
    'director' => 'Christopher Nolan',
    'language' => 'English',
    'website' => 'https://www.themoviedb.org/movie/27205-inception',
    'budget' => 160000000,
    'quotes' => [
        'I bought the airline.',
        'Because, in my dreams we are together.',
        'You\'re waiting for a train. A train that\'ll take you far away.',
    ],
];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="<?= $movie['website'] ?>"><?= $movie['title'] ?></a>
</body>

</html>