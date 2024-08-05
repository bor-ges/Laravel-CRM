<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upsale extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_contratos',
        'descr_contratos',
        'gera_prospecto',
        'gera_demanda',
        'status_demanda',
        'data_fim_demanda',
    ];
}

