<?php

$json = file_get_contents(
    'https://yrgo.github.io/api/movies/what-we-do-in-the-shadows.json'
);
$actors = json_decode($json, true);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (!empty($actors)) : ?>
        <h2>Actors</h2>
        <ul>
            <?php foreach ($actors as $actor): ?>
                <li><?= $actor['name'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h2>No actors found</h2>
    <?php endif; ?>

</body>

</html>