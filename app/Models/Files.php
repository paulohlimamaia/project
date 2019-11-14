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
        'type',
        'processado',
        'valido'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function balancos()
    {
        return $this->hasMany(Bal::class, 'id_file', 'id_file');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function sim302()
    {
        return $this->hasMany(SIM302::class, 'id_file', 'id_file');
    }
}
