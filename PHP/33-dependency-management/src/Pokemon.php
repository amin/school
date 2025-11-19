<?php

declare(strict_types=1);

namespace App;

class Pokemon
{
    public function __construct(public string $name, public int $id) {}
    public function getImageUrl()
    {

        $urlName = $this->name;
        
        switch (ord(substr($this->name, -1))) {
            case 130:
                $urlName = mb_substr($this->name, 0, -1);
                $urlName = sprintf(
                    '%s-m',
                    $urlName
                );
                break;
            case 128:
                $urlName = mb_substr($this->name, 0, -1);
                $urlName = sprintf('%s-f', $urlName);
        }

        $urlName = str_replace(["’"], "", $urlName);

        $url = sprintf(
            'https://img.pokemondb.net/sprites/bank/normal/%s.png',
            strtolower($urlName)
        );

        return $url;
    }
}
