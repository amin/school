<?php

declare(strict_types=1);

// unset($_COOKIE['counter']);

if (!isset($_COOKIE['counter'])) {
    setcookie('counter', '0', time() + 3600);
}

$pageViews = intval($_COOKIE['counter']) + 1;
setcookie('counter', (string) $pageViews, time() + 3600);
printf('Number of page view: %s', $pageViews);
