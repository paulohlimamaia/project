<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bals', function (Blueprint $table) {
            $table->bigIncrements('id_bal');

            $table->string('tipo_documento');
            $table->string('codigo_municipio');
            $table->string('exercicio_orcamento');
            $table->string('codigo_orgao');
            $table->string('codigo_unidade_orcamentaria');
            $table->string('codigo_receita_orcamentaria');
            $table->string('codigo_grupo_fonte');
            $table->string('codigo_especificacao_fonte');

            $table->date('data_referencia_documentacao');

            $table->string('tipo_balancete');

            $table->string('valor_previsto_orcamento');
            $table->string('valor_anulacoes_mes_atual');
            $table->string('valor_anulacoes_mes_passados');
            $table->string('valor_arrecadacao_mes_atual');
            $table->string('valor_arrecadacao_mes_passados');

            $table->unsignedInteger('id_file');
            $table->foreign('id_file')->references('id_file')->on('files');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bals');
    }
}
