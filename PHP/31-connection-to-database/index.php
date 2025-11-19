<?php

require_once __DIR__ . '/bootstrap.php';


$pokemon = $database->select()->from('pokemon')->where("id", '>', 5)->and("id", "<", 10)->first();

echo '<pre>';
print_r($pokemon);
