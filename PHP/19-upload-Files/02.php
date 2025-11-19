<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$allowedExtensions = ['png'];
$errors = [];
$uploadsDir = __DIR__ . '/uploads/';

if (!file_exists($uploadsDir)) {
    mkdir($uploadsDir);
}

// TODO: Implement the upload script here.

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

    $avatar = $_FILES['avatar'];
    $ext = pathinfo($avatar['full_path'], PATHINFO_EXTENSION);

    if (!in_array($ext, $allowedExtensions)) {
        $errors[] = 'The image file type is not allowed.';
    }

    if (filesize($avatar['tmp_name']) > 2000000) {
        $errors[] = 'The uploaded file exceeded the file size limit.';
    }

    if (empty($errors)) {
        $fileName = sprintf('%s-%s', date('y-m-d'), $avatar['name']);
        move_uploaded_file($avatar['tmp_name'], $uploadsDir . $fileName);
        echo 'File succesfully uploaded.';
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02</title>
</head>

<body>

    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <?= $error ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="02.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="avatar">Choose a PNG image to upload</label>
            <input type="file" name="avatar" id="avatar" required>
        </div>

        <button type="submit">Upload</button>
    </form>
</body>

</html>