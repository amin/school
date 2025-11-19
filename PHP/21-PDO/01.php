<?php

$database = new PDO('sqlite:startrek.db');

$actor = $database->query('SELECT * FROM Characters')->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($actor['name']);
echo '</pre>';
