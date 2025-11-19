<?php

declare(strict_types=1);

foreach (scandir('files') as $file) {
    printf('%s<br>', $file);
}
