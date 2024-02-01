<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abordagem extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_abordagem',
        'tipo_abordagem',
        'data_abordagem'
    ];
}
