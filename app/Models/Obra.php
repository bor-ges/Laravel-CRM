<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'num_contrato',
        'tipo_contrato',
        'contratante',
        'endereco',
        'prazo_contratual',
        'data_inicio',
        'prev_termino',
        'img_capa',
        'resumo',
        'search',
        'status'


    ];
}
