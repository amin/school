<?php

declare(strict_types=1);
session_start();

setcookie('title', 'Silicon Valley', time() + 3600);

if (isset($_COOKIE['title'])) {
    printf('%s', $_COOKIE['title']);
}
