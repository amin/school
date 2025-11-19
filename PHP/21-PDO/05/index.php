<?php
$pdo = new PDO('sqlite:../startrek.db');

$statement = $pdo->query('SELECT * FROM characters ORDER BY name');

$characters = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>05</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($characters as $character) : ?>
                <tr>
                    <td><?php echo $character['name']; ?></td>
                    <td><a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $character['id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>