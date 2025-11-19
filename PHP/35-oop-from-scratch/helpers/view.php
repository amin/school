<?php

declare(strict_types=1);

function view(string $view): string
{
    return __DIR__ . '/../views/' . $view . '.view.php';
}
