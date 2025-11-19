<?php
// TODO: Implement the upload script here.

if (isset($_FILES['avatar'])) {
    var_dump($_FILES);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01</title>
</head>

<body>
    <form action="01.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="avatar">Choose a PNG image to upload</label>
            <input type="file" name="avatar" id="avatar" required>
        </div>

        <button type="submit">Upload</button>
    </form>
</body>

</html>