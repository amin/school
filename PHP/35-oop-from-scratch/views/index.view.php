<?php

declare(strict_types=1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
</head>
<body>
    <?php if (!empty($products)) :?>
    <ul>
        <?php foreach ($products as $product) : ?>
            <li><?= $product->getName() ?> <span>$<?= $product->getPrice() ?></span></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</body>
</html>