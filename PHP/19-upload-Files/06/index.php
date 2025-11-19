<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$uploadsDir = __DIR__ . '/uploads/';
$errors = [];
if (!file_exists($uploadsDir)) {
    mkdir($uploadsDir);
}

if (isset($_FILES['gifs'])) {
    $gifs = $_FILES['gifs'];

    for ($i = 0; $i < count($gifs['name']); $i++) {

        $fileName = $gifs['name'][$i];
        $errors[$fileName] = [];

        if ($gifs['type'][$i] !== 'image/png') {
            $errors[$fileName]['type'] = 'Only pngs allowed';
        }

        if (filesize($gifs['tmp_name'][$i]) > 2000000) {
            $errors[$fileName]['size'] = 'The uploaded file exceeded the file size limit.';
        }

        if (empty($errors[$fileName])) {
            $filePath = sprintf("%s%s-%s", $uploadsDir,  date('ymd'), $gifs['name'][$i]);
            move_uploaded_file($gifs['tmp_name'][$i], $filePath);
        }
    }
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

    <pre>
    <?php var_dump($errors); ?>
    </pre>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="gifs">Upload your favourit GIF here</label>
            <input type="file" name="gifs[]" id="gif" multiple required>
        </div>
        <button type="submit">Upload</button>
    </form>
</body>

</html>