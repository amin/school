<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
</head>

<body>
    <h1><?= $pokemonObject->name ?></h1>
    <img height="150" src="<?= $pokemonObject->getImageUrl() ?>" alt="">
    <a href="/" style="display:block">Go back home</a>
</body>

</html>