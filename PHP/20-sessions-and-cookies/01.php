<?php

declare(strict_types=1);
session_start();

$_SESSION['title'] = 'Silicon Valley';

printf('The title of the show is %s', $_SESSION['title']);
