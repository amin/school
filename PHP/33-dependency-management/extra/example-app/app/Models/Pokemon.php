<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemon';
    public $timestamps = false;

    public function getLink(): string
    {
        return sprintf('/pokemon/%s', $this->id);
    }

    public function getImgUrl(): string
    {
        return "https://img.pokemondb.net/sprites/bank/normal/" . str_replace(['♂', '♀', '. ', '’'], ['-m', '-f', '-', ''], strtolower($this->name)) . ".png";
    }
}
