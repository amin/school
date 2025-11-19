<?php
// To connect to our database we first new to create a new instance of the PDO
// (PHP Data Objects) class. We use the new keyword to create a new instance and
// pass the database type (sqlite) along with the path to the database file.
// https://www.php.net/manual/en/intro.pdo.php
$database = new PDO('sqlite:startrek.db');

// To query the database we can use the query function which exists on the PDO
// class. It executes an SQL statement and return the result. The arrow (->),
// also known as an object operator, is used in order to access functions, also
// known as methods, on a class.
$statement = $database->query('SELECT * FROM actors ORDER BY name');

// This is how we fetch the first item/record from the database query. We pass
// the PDO constant FETCH_ASSOC to get the item back as an associative array.
$actor = $statement->fetch(PDO::FETCH_ASSOC); // ['id' => '1'. 'name' => 'Alan Ruck']

// If we want to fetch multiple items/records from the database query we can use
// the fetchAll function/method. We pass the PDO constant FETCH_ASSOC to get the
// item back as associative arrays.
$actors = $statement->fetchAll(PDO::FETCH_ASSOC); // array(16) [ ... ]

print_r($actor);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Introduction</title>
</head>

<body>
    <ul>
        <?php foreach ($actors as $actor) : ?>
            <li><?php echo $actor['name']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>