<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impt extends Model
{
    protected $table = 'impts';
    protected $primaryKey = 'id_impt';

    protected $fillable = [
        'campo1',
        'campo2',
        'campo3',
        'v0',
        'v1',
        'v2',
        'v3',
        'v4',
        'v5',
        'v6',
        'campo11',
        'campo12',
        'campo13',
        'id_file'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function file()
    {
        return $this->belongsTo(Files::class, 'id_file');
    }
}
