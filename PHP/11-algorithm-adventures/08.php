<?php

$hasParent = true;
$age = 16;

// TODO: Implement the if statement logic.

if ($age < 18 && $hasParent) {
    echo "You can go ahead and watch The Square with your parents.";
} else if ($age < 18 && !$hasParent) {
    echo "Sorry. You're not allowed to watch The Square without your parents.";
} else {
    echo "Welcome to the movie theatres, you're a grown-up!";
}
