<?php

$actors = [
    ['name' => 'Andie MacDowell', 'year' => 1958],
    ['name' => 'Bill Murray', 'year' => 1950],
    ['name' => 'Chris Elliot', 'year' => 1960],
    ['name' => 'Stephen Tobowsky', 'year' => 1951],
];

?>

<ul>
    <?php foreach ($actors as $actor): ?>
        <li><?= $actor['name'] ?> was born <?= $actor['year'] ?>.</li>
    <?php endforeach; ?>
</ul>