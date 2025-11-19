<?php

declare(strict_types=1);


function greeting(string $firstName, string $lastName): string
{
    return "Hey, $firstName $lastName";
}

echo greeting("Ace", "Ventura!");
