<?php require_once __DIR__ . '/data/actors.php'; ?>
<?php require_once __DIR__ . '/header.php'; ?>

<main>
    <?php foreach ($actors as $actor) : ?>
        <article>
            <img
                src="<?= $actor['IMG_URL'] ?>"
                alt="<?= $actor['ACTOR_NAME'] ?>" />
            <h2><?= $actor['ACTOR_NAME'] ?></h2>
            <p><?= $actor['CHARACTER_NAME'] ?></p>
        </article>
    <?php endforeach; ?>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>