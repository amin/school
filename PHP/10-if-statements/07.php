<?php

$map = [
    [0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0],
    [0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0],
    [0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0],
    [0, 1, 1, 0, 1, 1, 1, 0, 1, 1, 0],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1],
    [1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1],
    [0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0],
];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bit</title>

    <style>
        .row {
            display: flex;
            flex-direction: row;
        }

        .bit {
            height: 24px;
            width: 24px;
        }

        .bit__white {
            background-color: #fff;
        }

        .bit__black {
            background-color: #000;
        }
    </style>

</head>

<body>
    <?php foreach ($map as $row): ?>
        <div class="row">
            <?php foreach ($row as $bit): ?>
                <div class="bit <?= $bit === 0 ? 'bit__white' : 'bit__black'; ?> "></div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</body>

</html>