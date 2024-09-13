<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model {
    use HasFactory;

    protected $table = 'filmes';

    protected $fillable = [
        //{{-- nome, sinopse, ano, categoria, imagem da capa, link do trailer no YouTube --}}
        'id',
        'nome',
        'sinopse',
        'ano',
        'categoria',
        'link'
    ];
}

