<?php

declare(strict_types=1);

function getAverage(...$numbers)
{
    if (empty($numbers)) {
        return 0; // or throw an exception
    }
    return array_sum($numbers) / count($numbers);
}

echo getAverage(10, 0, 10);
