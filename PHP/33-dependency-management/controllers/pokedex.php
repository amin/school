<?php

declare(strict_types=1);

use App\Pokemon;

$pokemons = $database->select()->from('pokemon')->get();

$pokemonObjects = array_map(function ($pokemon) {
    return new Pokemon($pokemon->name, $pokemon->id);
}, $pokemons);

require view('pokedex');
