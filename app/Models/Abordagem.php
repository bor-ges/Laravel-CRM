<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abordagem extends Model
{
    use HasFactory;

    protected $table = 'abordagens'; // Especifica o nome da tabela

    protected $fillable = [
        'tipo',
        'meio_contato',
        'descricao',
        'arquivo_abordagem',
        'objecao',
    ];
}
