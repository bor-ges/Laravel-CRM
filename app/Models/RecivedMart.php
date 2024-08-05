<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecivedMart extends Model
{
    use HasFactory;

    protected $fillable = [
        'recived_mat_name',
        'report'
    ];
}
