<?php


if (count(array_diff($_POST, array_filter($_POST)))) {
    printf("All fields required.");
} else if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    printf("Your email address is %s and your password is %s.", $email, $password);
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
    <form action="06.php" method="post">
        <input type="text" name="email" placeholder="e-mail">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="login" name="submit">
    </form>
</body>

</html>