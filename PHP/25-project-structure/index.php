<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <?php if (isset($_SESSION['user'])) : ?>
        <h3>Welcome <?= $_SESSION['user']['name'] ?>!</h3>
        <hr>
    <?php endif; ?>


    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>