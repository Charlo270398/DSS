<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinica_id')->unsigned();
            $table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('cascade');
            $table->string('nombre');
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
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('departamentos');
    }
}
