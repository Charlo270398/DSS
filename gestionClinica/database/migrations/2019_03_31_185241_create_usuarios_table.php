<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            //Comun a todos
            $table->increments('id');
            $table->string('dni')->unique();
            $table->string('nombre');
            $table->string('password')->nullable(false);
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->timestamp('fecha_nacimiento')->nullable();
            $table->string('remember_token')->nullable();
            //Exclusivo de médico
            $table->string('num_colegiado')->nullable()->unique();
            $table->integer('departamento_id')->nullable()->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('rols');
            $table->string('imagen')->nullable();

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
        Schema::dropIfExists('entradas');
        
    }
}
