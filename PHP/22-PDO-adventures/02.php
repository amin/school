<?php
// ?? is the shorthand for an if statement with an isset check. If the ID value
// doesn't exist we give it a default value `1`.
$id = $_GET['id'] ?? 1;

// TODO: Implement the database logic here.
$db = new PDO('sqlite:tmdb.db');

$prepare = $db->prepare('SELECT * FROM directors WHERE id = :id');
$prepare->bindParam(':id', $id);
$prepare->execute();

$director = $prepare->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02</title>
</head>

<body>
    <!-- TODO: Implement the director data presentation here. -->
    <?php if (!empty($director)) : ?>
        <h2><?= $director['first_name'] ?> <?= $director['last_name'] ?></h2>
        <p><?= $director['biography'] ?></p>

    <?php else: ?>
        <h2>Not Found</h2>
        <p>The director wasn't found in the database.</p>
    <?php endif; ?>
</body>

</html>