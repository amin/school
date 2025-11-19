<?php

declare(strict_types=1);

namespace Amincident\fromScratch\Http;

class Request
{
    public static function uri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }
}