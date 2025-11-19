<?php

$_GET = array_filter($_GET);

if (isset($_GET['name'])) {
    printf('Hello, %s.', $_GET['name']);
}
