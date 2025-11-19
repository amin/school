<?php

declare(strict_types=1);

$user = [
    'name' => 'Bertram Gilfoyle',
    'email' => 'gilfoyle@piedpiper.io',
    'password' => '$2y$10$Qx.ZsPJooxIqFDewbA9wS.fY6Nkp5qkmJynqkbwxmEyX5Q9Er5EBW',
];

$password = 'username-is-password';

// TODO: Implement the login logic here.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $inputPassword = $_POST['password'] ?? '';

    if ($email && !empty($inputPassword)) {
        if ($email === $user['email'] && password_verify($inputPassword, $user['password'])) {
            printf("Welcome, %s!", $user['name']);
        } else {
            echo "Whoops. Looks like you missed something. Please try again.";
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="your@email.com">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Submit">
    </form>
</body>

</html>