<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';
    protected $primaryKey = 'id_file';

    protected $fillable = [
        'pathfile',
        'filename',
        'type'
    ];
}
