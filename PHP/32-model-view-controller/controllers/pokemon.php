<?php

use App\Http\Request;

$urlParams = Request::getUriParams();
$pokemon = $database->select()->from('pokemon')->where('id', '=', $urlParams['id'])->first();

$pokemon->url = $pokemon->name;

switch (ord(substr($pokemon->name, -1))) {
    case 130:
        $pokemon->url = mb_substr($pokemon->name, 0, -1);
        $pokemon->url = sprintf('%s-m', $pokemon->url);
        break;
    case 128:
        $pokemon->url = mb_substr($pokemon->name, 0, -1);
        $pokemon->url = sprintf('%s-f', $pokemon->url);
        break;
    default:
        $pokemon->url = str_replace(['"', "'", "’"], "", $pokemon->url);
        break;
}

require view('pokemon');
