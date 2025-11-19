<?php

declare(strict_types=1);
session_start();

$message = $_SESSION['message'];
unset($_SESSION['message']);

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
            margin-bottom: 10px;
            min-width: 200px;
        }
    </style>
</head>

<body>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>


    <?php if (!$_SESSION['authenticated']) : ?>
        <form action="/05/login.php" method="post">
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="hendriks@piedpiper.io">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>

            <button type="submit">Login</button>
        </form>
    <?php else: ?>
        <a href="/05/logout.php">Logout</a>
    <?php endif; ?>

</body>

</html>