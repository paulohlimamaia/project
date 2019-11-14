<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siops extends Model
{
    protected $table = 'siops';

    protected $fillable = [
        'codigo',
        'tipo'
    ];
}
