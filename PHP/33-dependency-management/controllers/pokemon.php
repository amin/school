<?php

use App\Pokemon;

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) throw new Exception('Pokemon not found.');

$pokemon = $database->select()->from('pokemon')->where('id', '=', $id)->first();
$pokemonObject = new Pokemon($pokemon->name, $pokemon->id);

require view('pokemon');
