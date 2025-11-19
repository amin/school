<?php

session_start();

$results = $_SESSION['results'] ?? [];
$_SESSION['results'] = [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

    <style>
        body {
            font-family: sans-serif;
        }

        .movies {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;

        }

        .movie-img {
            width: 300px;
        }

        .movie-director {
            display: block;
        }
    </style>
</head>

<body>

    <h1>Find a movie</h1>
    <p>Search for a movie in the TMDB database.</p>

    <form action="/05/search.php" method="post">
        <input type="text" name="movie" placeholder="Movie">
        <input type="submit" value="Search Movie">
    </form>

    <?php if (count($results)): ?>
        <div class="movies">
            <?php foreach ($results as $result): ?>
                <div class="movie">
                    <img class="movie-img" src="<?= htmlspecialchars($result['image_url']) ?>" alt="">
                    <h2 class="movie-title"><?= htmlspecialchars($result['title']) ?></h2>
                    <a class="movie-tmdb-link" target="_blank" href="<?= htmlspecialchars($result['tmdb_url']) ?>">TMDB</a>
                    <b class="movie-director"><?= htmlspecialchars($result['director']) ?></b>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</body>

</html>