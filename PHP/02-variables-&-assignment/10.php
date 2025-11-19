<?php

$name = 'Dominic West';
$yearOfBirth = 2007;
$currentYear = date('Y');
$age = $currentYear - $yearOfBirth;

if($age >= 18) {
    echo "${name} is old enough to drive.";
}
