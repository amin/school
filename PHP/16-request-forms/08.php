<?php
$errors = [];

// TODO: Implement the login error logic here.

$validEmail = "penelope@cr.uz";
$validPassword = "versace";
$loggedIn = 0;

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    if ($email === $validEmail && $password === $validPassword) {
        $loggedIn = 1;
    } else {
        $errors[] = 'Whoops... The provided credentials does not match our records!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>08-09</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <form class="col-lg-6 mt-3" action="08.php" method="post">
            <?php foreach ($errors as $error) : ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <?php if ($loggedIn): ?>
                <div class="alert alert-success">
                    You have successfully logged in.
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="versace@yrgo.se">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
    </main>
</body>

</html>