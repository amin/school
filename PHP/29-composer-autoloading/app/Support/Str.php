<?php

declare(strict_types=1);

namespace App\Support;

class Str
{
    public static function camelCase(string $string): string
    {
        $string = str_replace(['_', '-'], ' ', $string);

        $words = explode(' ', $string);

        $words = array_map(function ($word) {
            return ucwords(strtolower($word));
        }, $words);

        return lcfirst(implode('', $words));
    }

    public static function kebabCase(string $string): string
    {
        return strtolower(str_replace(' ', '-', $string));
    }

    public static function snakeCase(string $string): string
    {
        return strtolower(str_replace(' ', '_', $string));
    }

    public static function constantCase(string $string): string
    {
        return strtoupper(str_replace(' ', '_', $string));
    }

    public static function pascalCase(string $string): string
    {
        $words = explode(' ', $string);

        $words = array_map(function ($word) {
            return ucfirst($word);
        }, $words);

        return implode('', $words);
    }
}
