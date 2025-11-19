<?php

$config = require __DIR__ . '/config.php';
require __DIR__ . '/vendor/autoload.php';

use App\Database\Connection;
use App\Database\QueryBuilder;

$database = new QueryBuilder(
    Connection::make($config['driver'], $config['host'], $config['database'], $config['username'], $config['password'])
);
