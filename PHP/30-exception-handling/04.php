<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Character;
use App\Episode;

$episode = new Episode('The Shame Wizard');

$episode
    ->addCharacter(new Character('Nick Birch'))
    ->addCharacter(new Character('Andrew Glouberman'))
    ->addCharacter(new Character('Missy Foreman-Greenwald'));
?>
<ul>
    <?php foreach ($episode->characters as $character) : ?>
        <li><?= $character->name ?></li>
    <?php endforeach; ?>
</ul>