<?php

$url = 'https://social.network.net';


if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo 'This URL is valid.';
} else {
    echo 'This URL is not valid.';
}
