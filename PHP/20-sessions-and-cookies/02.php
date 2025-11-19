<?php

declare(strict_types=1);
session_start();

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

$_SESSION['counter']++;

printf('Number of page view: %s', $_SESSION['counter']);
