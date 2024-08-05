<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_date',
        'related_project',
        'entry_time',
        'dep_time',
        'intv_dep',
        'intv_entry',
        'report_status'
    ];
}
