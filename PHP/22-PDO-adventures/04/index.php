<?php
$database = new PDO('sqlite:../tmdb.db');
$id = trim($_GET['id'] ?? 1);

$stmt = $database->prepare('SELECT * FROM directors WHERE id = :id');
$stmt->bindParam(':id', $id);
$stmt->execute();
$director = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="col-md-6">
                <form action="/04/update.php" method="post">
                    <input type="hidden" name="id" value="<?= $director['id'] ?>">

                    <div class="mb-3">
                        <label for="first_name" class="form-label">First name</label>
                        <input class="form-control" type="text" name="first_name" id="first_name" value="<?= htmlspecialchars($director['first_name']) ?>">
                        <small class="form-text">Please provide the director's first name.</small>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last name</label>
                        <input class="form-control" type="text" name="last_name" id="last_name" value="<?= htmlspecialchars($director['last_name']) ?>">
                        <small class="form-text">Please provide the director's last name.</small>
                    </div>

                    <div class="mb-3">
                        <label for="tmdb_url" class="form-label">TMDb URL</label>
                        <input class="form-control" type="url" name="tmdb_url" id="tmdb_url" value="<?= htmlspecialchars($director['tmdb_url']) ?>">
                        <small class="form-text">Please provide the movie's TMDb URL.</small>
                    </div>

                    <div class="mb-3">
                        <label for="biography" class="form-label">Biography</label>
                        <textarea class="form-control" name="biography" id="biography" rows="8" cols="80"><?= htmlspecialchars($director['biography']) ?></textarea>
                        <small class="form-text">Please provide the director's biography.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>