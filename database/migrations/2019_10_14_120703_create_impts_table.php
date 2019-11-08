<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impts', function (Blueprint $table) {
            $table->bigIncrements('id_impt');

            $table->string('campo1');
            $table->string('campo2');
            $table->string('campo3');
            $table->string('v0');
            $table->string('v1');
            $table->string('v2');
            $table->string('v3');
            $table->string('v4');
            $table->string('v5');
            $table->string('v6');
            $table->string('campo11');
            $table->string('campo12');
            $table->string('campo13');



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
        Schema::dropIfExists('impts');
    }
}
