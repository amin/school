<?php

declare(strict_types=1);

$errors = [];

// TODO: Implement the login error logic here.

$validUser = [
    'email' => 'penelope@cr.uz',
    'password' => 'versace'
];

$loggedIn = false;

function authenticateUser(string $email, string $password, array $validUser): bool
{
    return $email === $validUser['email'] && $password === $validUser['password'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

    if (!$email) $errors[] = 'The email address is not a valid email address!';
    if (empty($password)) $errors[] = 'Password field cannot be empty!';

    if ($email && !empty($password)) {
        $loggedIn = authenticateUser($email, $password, $validUser);
        if (!$loggedIn) {
            $errors[] = 'Whoops... The provided credentials does not match our records!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <form class="col-lg-6 mt-3" action="10.php" method="post">

            <?php if ($loggedIn): ?>
                <div class="alert alert-success">
                    You have successfully logged in.
                </div>
            <?php endif; ?>

            <?php foreach ($errors as $error) : ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="versace@yrgo.se">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>
        </form>
    </main>
</body>

</html>