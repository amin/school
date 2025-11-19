<?php

$actors = [
    ['name' => 'Andie MacDowell', 'year' => 1958],
    ['name' => 'Bill Murray', 'year' => 1950],
    ['name' => 'Chris Elliot', 'year' => 1960],
    ['name' => 'Stephen Tobowsky', 'year' => 1951],
];

?>

<ol>
    <?php for ($i = 0; $i < count($actors); $i++) : ?>
        <li><?= $actors[$i]['name'] ?> was born <?= $actors[$i]['year'] ?>.</li>
    <?php endfor; ?>
</ol>