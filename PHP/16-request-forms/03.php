<?php

$_GET = array_filter($_GET);

if (isset($_GET['name'])) {

    if (isset($_GET['age'])) {
        printf('Hello, %s. You\'re %s years old.', $_GET['name'], $_GET['age']);
    } else {
        printf('Hello, %s.', $_GET['name']);
    }
}
