<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = sanitizeData($_POST['first_name']);
    $lastName = sanitizeData($_POST['last_name']);
    printf('Your company email is: %s.%s@facebook.com', $firstName, $lastName);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>05</title>
    <style>
        input {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <!-- TODO: Display the generated email sentence here. -->

    <form action="05.php" method="post">
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" required>

        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" required>

        <button type="submit">Generate email address</button>
    </form>
</body>

</html>