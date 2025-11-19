<?php

function sanitizeData(string $element): string
{
    return htmlspecialchars(trim($element), ENT_QUOTES, 'UTF-8');
}
