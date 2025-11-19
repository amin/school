<?php
$comments = [
    ['name' => 'Andrew Cunanan', 'message' => 'My father. My father. He\'s a liar. My father\'s a thief.'],
    ['name' => 'Modesto Cunanan', 'message' => 'Don\'t believe a word they say.'],
    ['name' => 'Gianni Versace', 'message' => 'Success only comes with hard work.'],
];

$error = "";
// TODO: Implement the comments logic here.


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    if ($name !== '' && $message !== '') {
        $comments[] = ['name' => $name, 'message' => $message];
    } else {
        $error = 'All fields required';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>07</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
        *,
        p {
            margin: 0;
            padding: 0;
        }

        .error {
            width: 100%;
            background-color: red;
            padding: 1rem;
            color: #fff;
            margin-bottom: 2rem;
        }
    </style>

</head>

<body>
    <main class="container">
        <div class="row mt-4">
            <?php if ($error !== ""): ?>
                <div class="error">
                    <p><?= $error ?></p>
                </div>
            <?php endif; ?>
            <div class="col-lg-6 offset-lg-3">
                <h1 class="h5">Comments</h1>
                <?php foreach ($comments as $comment): ?>
                    <span style="font-weight: bold;"><?= $comment['name'] ?></span>
                    <p><?= $comment['message'] ?></p>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row">
            <form class="col-lg-6 offset-lg-3" action="07.php" method="post">
                <hr>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3" class="form-label">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add comment</button>
            </form>
        </div>
    </main>
</body>

</html>