<?php

declare(strict_types=1);

$quote = '?kaeps uoy nehw ,ekiL ?semitemos flesruoy raeh uoy oD';

$characters = str_split($quote);
$characters = array_reverse($characters);
$quote = implode($characters);

print_r($quote);
