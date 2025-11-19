<?php
if (isset($_POST['quote'])) {
    echo 'Now visit the developer tools and try to find the form data sent from the request!';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04</title>
    <style>
        button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form action="04.php" method="post">
        <!--
            The hidden input field is not visible to the user which makes it
            usable when you want to send data the user shouldn't care about.
            Though, since this is HTML it can still be found by looking at the
            source code of a page in the developer tools.
            -->
        <input type="hidden" name="quote" value="To me, family is everything.">

        <button type="submit">Submit</button>
    </form>
</body>

</html>