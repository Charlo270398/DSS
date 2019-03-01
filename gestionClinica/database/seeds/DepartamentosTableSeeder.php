<?php

use Illuminate\Database\Seeder;

function anyadirBox($cli, $num){

    $clinica= DB::table('clinicas')->where('nombre', $cli)->first();

    if($clinica != null){
        DB::table('boxes')->insert(['numero' => $num, 'id_clinica'=>$clinica->id]);
    }
    else{
		echo("ERROR: no existe $cli en la BD \n");    
    }
}

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Borramos los datos de la tabla
        DB::table('boxes')->delete();
        
        // Añadimos una entrada a esta tabla
        anyadirBox('Clinica Alicante', 1);
        anyadirBox('Clinica Alicante', 2);
        anyadirBox('Clinica Alicante', 3);
        anyadirBox('Clinica Alicante', 4);
        anyadirBox('Clinica Alicante', 5);
        anyadirBox('Clinica Alicante', 6);
    }
}
