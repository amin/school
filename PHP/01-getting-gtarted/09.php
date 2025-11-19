<?php

$colors = ['aqua', 'cornflowerblue', 'aquamarine'];
$width = 200;
$height = 150;


foreach($colors as $color):?>
    <div style="width: <?=$width?>px; height: <?=$height?>px; background-color: <?=$color?>;"></div>
<?php endforeach;