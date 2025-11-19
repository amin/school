<?php
$people = [
    'Christopher Læssø' => true,
    'Ruben Östlund' => false,
    'Elisabeth Moss' => true,
];
?>
<ol>
    <?php foreach ($people as $name => $isActor) : ?>
        <?php if ($isActor): ?>
            <li><?= $name ?> is an actor.</li>
        <?php else : ?>
            <li><?= $name ?> is not an actor.</li>
        <?php endif ?>
    <?php endforeach; ?>
</ol>