<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    protected $fillable = [
        'tec_name',
        'tec_func',
        'tec_entrada',
        'tec_saida',
        'tec_interv',
        'tec_grupo',
        'tec_status'
    ];
}
