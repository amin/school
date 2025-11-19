<?php

declare(strict_types=1);
session_start();
unset($_SESSION['authenticated']);

header('Location: /05/');   
