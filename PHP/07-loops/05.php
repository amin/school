<?php
$movie = [
    'title' => 'Groundhog Day',
    'language' => 'English',
    'website' => 'https://www.themoviedb.org/movie/137-groundhog-day',
];
?>

<ul style="padding:0;margin:0;list-style-type:none">
    <?php foreach ($movie as $key => $value) : ?>
        <li><span style="font-weight:bold"><?= ucwords($key) ?>:</span> <?= $value ?></li>
    <?php endforeach; ?>
</ul>