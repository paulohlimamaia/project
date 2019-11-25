<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Codigos extends Model
{
    protected $table = 'codigos';

    protected $fillable = [
        'origem',
        'origem_descri',
        'destino',
        'destino_descri',
        'tipo'
    ];
}
