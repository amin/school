<?php

// TODO: Implement the database logic here.

$database = new PDO('sqlite:startrek.db');

$characters = $database->query('SELECT * FROM Characters')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02</title>
</head>

<body>
    <!-- TODO: Implement the ordered list here. -->
    <?php if (!empty($characters)): ?>
        <ol>
            <?php foreach ($characters as $character): ?>
                <li><?= htmlspecialchars($character['name']) ?></li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>
</body>

</html>