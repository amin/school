<?php

declare(strict_types=1);
session_start();

$user = [
    'name' => 'Bertram Gilfoyle',
    'email' => 'gilfoyle@piedpiper.io',
    'password' => '$2y$10$Qx.ZsPJooxIqFDewbA9wS.fY6Nkp5qkmJynqkbwxmEyX5Q9Er5EBW',
];

// TODO: Implement the login logic here.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $password = $_POST['password'] ?? '';

    if ($email && !empty($password)) {
        if ($email === $user['email'] && password_verify($password, $user['password'])) {
            $_SESSION['authenticated'] = true;
            $_SESSION['message'] = sprintf("You've successfully logged in %s!", htmlspecialchars($user['name']));
        } else {
            $_SESSION['message'] = "Whoops. Looks like you missed something. Please try again.";
        }

        header('Location: /05/index.php');
    }
}
