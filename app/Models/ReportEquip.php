<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportEquip extends Model
{
    use HasFactory;

    protected $fillable = [
        'equip_name',
        'report'
    ];
}
