<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

$yrgo = new School('Yrgo');

$yrgo->addProgram(new Program('Digital Designer'));
$yrgo->addProgram(new Program('Web Developer'));

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>At Yrgo you can apply to the following programs:</p>
    <ul>
        <?php foreach ($yrgo->getPrograms() as $progam): ?>
            <ol><?= $progam->name ?></ol>
        <?php endforeach; ?>
    </ul>
</body>
</body>

</html>