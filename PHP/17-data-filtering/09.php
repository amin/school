<?php

$errors = [];

$quotes = [
    ['character' => 'Mark Zuckerburg', 'quote' => 'You know, you really don\'t need a forensics team to get to the bottom of this. If you guys were the inventors of Facebook, you\'d have invented Facebook.'],
    ['character' => 'Marylin Delpy', 'quote' => 'You\'re not an asshole, Mark. You\'re just trying so hard to be.'],
];

// TODO: Implement the adding new quotes logic here.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filterDefinitions = [
        'email' => FILTER_SANITIZE_EMAIL,
        'character' => FILTER_SANITIZE_SPECIAL_CHARS,
        'quote' => FILTER_SANITIZE_SPECIAL_CHARS
    ];

    $filtered = filter_input_array(INPUT_POST, $filterDefinitions);
    $inputs = array_map(fn($e) => is_string($e) ? trim($e) : '', $filtered);

    foreach ($inputs as $field => $value) {
        if (strlen($value) === 0) $errors[] = sprintf('%s field is required.', ucfirst($field));
    }

    ['character' => $character, 'quote' => $quote, 'email' => $email] = $inputs;

    if (strlen($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = sprintf('%s is not a valid email.', $email);
    if (empty($errors)) $quotes[] = ['character' => $character, 'quote' => $quote, 'email' => $email];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>09</title>
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
                        <strong>
                            <?= htmlspecialchars($quote['character'], ENT_QUOTES, 'UTF-8') ?>
                            <?php if (!empty($quote['email'])) : ?>
                                (<?= htmlspecialchars($quote['email'], ENT_QUOTES, 'UTF-8') ?>)
                            <?php endif; ?>
                        </strong>
                        <div class="quote"><?= htmlspecialchars($quote['quote'], ENT_QUOTES, 'UTF-8') ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row">
            <form class="col-lg-8 offset-lg-2" action="09.php" method="post">
                <hr>
                <!-- TODO: Implement the errors list here. -->
                <?php foreach ($errors as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Oh no!</strong> <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endforeach; ?>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="your@email.com">
                </div>

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