<?php

require_once __DIR__ . '/functions.php';

$errors = [];

$quotes = [
    ['character' => 'Mark Zuckerburg', 'quote' => 'You know, you really don\'t need a forensics team to get to the bottom of this. If you guys were the inventors of Facebook, you\'d have invented Facebook.'],
    ['character' => 'Marylin Delpy', 'quote' => 'You\'re not an asshole, Mark. You\'re just trying so hard to be.'],
];

// TODO: Implement the adding new quotes logic here.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $character = sanitizeData($_POST['character']);
    $quote = sanitizeData($_POST['quote']);

    if (empty($character)) $errors[] = 'The character field is missing';
    if (empty($quote)) $errors[] = 'The quote field is missing';

    if (!empty($character) && !empty($quote)) $quotes[] = ['character' => $character, 'quote' => $quote];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>08</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row mt-4">
            <div class="col-lg-8 offset-lg-2">
                <h1 class="h5">Quotes</h1>
                <!-- TODO: Implement the quotes list here. -->
                <?php foreach ($quotes as $quote) : ?>
                    <div class="quote-container mb-2">
                        <strong><?= $quote['character'] ?></strong>
                        <div class=" quote"><?= $quote['quote'] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row">
            <form class="col-lg-8 offset-lg-2" action="08.php" method="post">
                <hr>
                <!-- TODO: Implement the errors list here. -->
                <?php foreach ($errors as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Oh no!</strong> <?= $error ?>.
                    </div>
                <?php endforeach; ?>

                <div class="mb-3">
                    <label for="character" class="form-label">Character</label>
                    <input type="text" name="character" id="character" class="form-control" placeholder="Sean Parker">
                </div>

                <div class="mb-3">
                    <label for="quote" class="form-label">Quote</label>
                    <textarea name="quote" id="quote" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add quote</button>
            </form>
        </div>
    </main>
</body>

</html>