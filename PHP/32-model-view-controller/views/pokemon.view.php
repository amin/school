<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
</head>

<body>
    <h1><?= $pokemon->name ?></h1>
    <img height="150" src="<?= sprintf('https://img.pokemondb.net/sprites/bank/normal/%s.png', urldecode(strtolower($pokemon->url))) ?>" alt="">
    <a href="/" style="display:block">Go back home</a>
</body>

</html>