<?php

declare(strict_types=1);

$database = new PDO('sqlite:startrek.db');
$roles = $database->query('
SELECT actors.name as actor_name, characters.name as character_name FROM actors
INNER JOIN characters
ON actors.id = characters.actor_id
ORDER BY character_name DESC
LIMIT 5
')->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <ul>
        <?php foreach ($roles as $role): ?>
            <li><?= $role['character_name'] ?> is portrayed by <?= $role['actor_name'] ?>.</li>
        <?php endforeach; ?>
    </ul>
</head>

<body>

</body>

</html>