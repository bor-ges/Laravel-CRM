<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo_contrato',
        'descricao',
        'tipo',
        'data_contrato',
        'numero_contrato',
        'arquivo_contrato',
        'situacao',
        'motivo_recusado',
    ];
}
