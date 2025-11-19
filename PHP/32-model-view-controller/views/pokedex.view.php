<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Pokedex</h1>

    <?php if (!empty($pokemons)): ?>
        <ul>
            <?php foreach ($pokemons as $pokemon): ?>
                <li><a href="/pokemon?id=<?= $pokemon->id; ?>"><?= $pokemon->name ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>