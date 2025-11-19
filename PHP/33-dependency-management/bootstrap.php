<?php

$config = require __DIR__ . '/config.php';
require __DIR__ . '/vendor/autoload.php';

use App\Database\Connection;
use App\Database\QueryBuilder;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$database = new QueryBuilder(
    Connection::make($_ENV['DATABASE_DRIVER'], $_ENV['DATABASE_HOST'], $_ENV['DATABASE_NAME'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD'])
);
