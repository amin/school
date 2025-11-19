<?php

$stars = [
    ['color' => 'aqua', 'size' => 2],
    ['color' => 'aquamarin', 'size' => 3],
    ['color' => 'hotpink', 'size' => 1],
    ['color' => 'white', 'size' => 2],
    ['color' => 'yellow', 'size' => 1],
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>09</title>
    <style>
        body {
            background-color: #111;
            position: relative;
            height: 100vh;
            width: 100vw;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        div {
            animation: fade-in 1s;
            position: absolute;
        }
    </style>
</head>

<body>
    <!-- TODO: Implement the space logic here. -->
    <?php for ($i = 0; $i <= 256; $i++): ?>
        <?php $star = $stars[array_rand($stars)] ?>
        <div style="top: <?= random_int(0, 100) ?>%; 
            left: <?= random_int(0, 100) ?>%; 
            background-color: <?= $star['color'] ?>; 
            width: <?= $star['size'] ?>px; 
            height:<?= $star['size'] ?>px"></div>
    <?php endfor; ?>
</body>

</html>