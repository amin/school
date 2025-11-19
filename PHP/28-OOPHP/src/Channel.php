<?php

declare(strict_types=1);

class Channel
{
    public function __construct(public string $name, public string $type)
    {
        if ($type !== 'text' && $type !== 'voice') {
            throw new Exception(sprintf('Invalid channel type [%s]', $type));
        }
    }
}
