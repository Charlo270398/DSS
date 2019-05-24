<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medico_id');
            $table->foreign('medico_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('box_id');
            $table->foreign('box_id')->references('id')->on('boxes'); 
            $table->timestamp('fecha');
            $table->string('motivo');
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
        Schema::dropIfExists('citas');
    }
}
