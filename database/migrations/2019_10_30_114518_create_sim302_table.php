<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use XBase\Table;


class CreateSIM302Table extends Migration
{
    protected $simTable;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->simTable = new Table(resource_path("dbf/SIM302.DBF"));

        Schema::create('sim302', function (Blueprint $table) {

            $table->bigIncrements('id');

            foreach($this->simTable->getColumns() as $colum){
                $table->string($colum->name)->nullable();            
            }

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
        Schema::dropIfExists('sim302');
    }
}
