<?php

$quotes = [
    'Do you ever have déjà vu, Mrs. Lancaster?',
    'Phil? Hey, Phil? Phil! Phil Connors? Phil Connors, I thought that was you!',
    'Well, what if there is no tomorrow? There wasn\'t one today.',
];

?>

<ul>
    <?php foreach ($quotes as $quote) : ?>
        <li><?= $quote ?></li>
    <?php endforeach; ?>
</ul>