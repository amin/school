<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/' ? 'active' : '' ?>" href="/">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/about.php' ? 'active' : '' ?>" href="/about.php">About</a>
            </li>

            <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/app/users/logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link <?= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/login.php' ? 'active' : '' ?>" href="/login.php">Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>