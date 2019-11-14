<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layouts extends Model
{
    protected $fillable = [
        'cod',
        'name',
        'pathfile',
        'tipo'
    ];
}
