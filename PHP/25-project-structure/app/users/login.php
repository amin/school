<?php

declare(strict_types=1);
require __DIR__ . '/../autoload.php';

// In this file we login users.
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $statement = $database->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$user) redirect('/login.php');

    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'email' => $user['email']];
        redirect('/');
    } else {
        echo 'Invalid password.';
    };
}
