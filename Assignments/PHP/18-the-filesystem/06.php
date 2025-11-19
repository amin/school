<?php

$directory = __DIR__ . '/files/';

if (!file_exists($directory)) {
    mkdir($directory);
}

$fileName = $_POST['name'] ?? '';
$content = $_POST['content'] ?? '';

if (!empty($fileName) && !empty($content)) {
    $filePath = sprintf('%s%s.txt', $directory, $fileName);
    file_put_contents($filePath, htmlspecialchars(trim($content), ENT_QUOTES, 'UTF-8'));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5 justify-content-md-center">
            <div class="col-md-6 ml-center">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="dana-scully.txt" class="form-control" required>
                        <small class="form-text">Please provide a filename without an extension.</small>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" rows="8" cols="80" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Note</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>