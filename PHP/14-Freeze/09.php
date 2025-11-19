<?php

$actors = [
    ['name' => 'Barry Nelson', 'character' => 'Stuart Ullman'],
    ['name' => 'Danny Lloyd', 'character' => 'Danny Torrance'],
    ['name' => 'Jack Nicholson', 'character' => 'Jack Torrance'],
    ['name' => 'Scatman Crothers', 'character' => 'Dick Hallorann'],
    ['name' => 'Shelley Duvall', 'character' => 'Wendy Torrance'],
];


$result = array_map(function ($actor) {
    [$firstName, $lastName] = explode(" ", $actor);
    return $lastName . ' ' . $firstName;
}, array_column($actors, 'name'));

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reverse array</title>
</head>

<body>
    <?php foreach ($result as $actor) : ?>
        <p><?= $actor ?></p>
    <?php endforeach; ?>
</body>

</html>