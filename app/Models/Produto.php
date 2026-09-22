<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Garanta que todos os novos campos estejam dentro deste array:
    protected $fillable = [
        'nome',
        'cor',
        'textura',
        'peso',
        'quantidade_estoque',
        'faixa_etaria_minima'
    ];
}
