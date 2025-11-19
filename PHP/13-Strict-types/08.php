<?php

declare(strict_types=1);

require __DIR__ . '/functions.php';

$map = getMap(height: 5, width: 5);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .row {
            display: flex;
            flex-direction: row;
        }

        .bit {
            width: 64px;
            margin: 4px;
        }
    </style>

</head>

<body>
    <div class="container">
        <?php for ($i = 0; $i < count($map); $i++) : ?>
            <div class="row">
                <?php for ($j = 0; $j < count($map[$i]); $j++) : ?>
                    <img class="bit" src="<?= getBlock($map[$i][$j]); ?>" />
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
    </div>
</body>

</html>