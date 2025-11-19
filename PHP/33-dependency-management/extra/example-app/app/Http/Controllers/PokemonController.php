<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::all();
        return view('pokedex', compact('pokemons'));
    }

    public function show($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemon', compact('pokemon'));
    }
}
