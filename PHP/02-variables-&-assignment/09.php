<?php

$name = 'Alicia Vikander';
$yearOfBirth = 1988;
$currentYear = date('Y');
$age = $currentYear - $yearOfBirth;

echo "${name} is ${age} years old.";