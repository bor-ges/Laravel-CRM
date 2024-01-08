<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    use HasFactory;
    protected $fillable = [
        'none_cliente',
        'conhecimento',
        'origem',
        'nome_oportunidade',
        'tipo_oportunidade',
        'data',
        'estimado',
        'probabilidade',
        'proximo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
