<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bal extends Model
{
    protected $table = 'bals';
    protected $primaryKey = 'id_bal';

    protected $fillable = [
        'tipo_documento',
        'codigo_municipio',
        'exercicio_orcamento',
        'codigo_orgao',
        'codigo_unidade_orcamentaria',
        'codigo_receita_orcamentaria',
        'codigo_grupo_fonte',
        'codigo_especificacao_fonte',
        'data_referencia_documentacao',
        'tipo_balancete',
        'valor_previsto_orcamento',
        'valor_anulacoes_mes_atual',
        'valor_anulacoes_mes_passados',
        'valor_arrecadacao_mes_atual',
        'valor_arrecadacao_mes_passados',
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
