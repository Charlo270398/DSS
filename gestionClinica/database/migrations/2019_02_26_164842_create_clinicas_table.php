<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicas', function (Blueprint $table) {
            $table->unsignedInteger('id');//No hemos podido hacer una clave compuesta con uno de los dos valores de caracter autoincremental
            $table->string('nombre');
            $table->string('direccion');
            $table->integer('id_box');
            $table->timestamp('fecha_inauguracion');
            $table->primary(['id', 'id_box']);
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
        Schema::dropIfExists('clinicas');
    }
}
