<?php

declare(strict_types=1);

namespace App\Http;

class Request
{
    public static function uri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }
    public static function getUriParams(): array
    {
        $query = parse_url(self::uri(), PHP_URL_QUERY);

        if ($query === null) {
            return [];
        }

        parse_str($query, $params);
        return $params;
    }
}
