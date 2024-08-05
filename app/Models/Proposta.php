<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_proposta',
        'tipo_proposta',
        'data_proposta',
        'descricao',
        'arquivo_proposta',
    ];
}
