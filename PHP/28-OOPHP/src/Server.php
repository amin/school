<?php

declare(strict_types=1);

class Server
{
    public function __construct(public string $name, public array $channels) {}
}
