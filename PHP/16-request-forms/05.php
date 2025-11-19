<?php

$_POST = array_filter($_POST);

if (isset($_POST['email'], $_POST['password'])) {
    print_r($_POST);
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
    <form action="05.php" method="post">
        <input type="text" name="email" placeholder="e-mail">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="login" name="submit">
    </form>
</body>

</html>