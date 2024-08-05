<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente',
        'id_cliente',
        'descr_cliente',
        'descr_projeto',
        'valor_estimado',
        'descr_dores',
        'data_contato',
        'indicacao',
        'chance_convercao',
        'situacao',
        'motivo',
        'data_reabordar',
        'confidencial',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'estado',
        'prospecto_id',
    ];

    public function prospecto()
    {
        return $this->belongsTo(Prospecto::class);
    }
}
