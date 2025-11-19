<?php

function isPalindrome(string $word): bool
{
    return $word === strrev($word) ? true : false;
}

var_dump(isPalindrome('racecar'));
