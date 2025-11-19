<?php

$pokemons = $database->select()->from('pokemon')->get();
require view('pokedex');
