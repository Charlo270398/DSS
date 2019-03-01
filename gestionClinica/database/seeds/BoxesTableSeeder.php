<?php

use Illuminate\Database\Seeder;

function anyadirDep($cli, $nombreDep){

    $clinica= DB::table('clinicas')->where('nombre', $cli)->first();

    if($clinica != null){
        DB::table('departamentos')->insert(['nombre' => $nombreDep, 'id_clinica'=>$clinica->id]);
    }
    else{
		echo("ERROR: no existe $cli en la BD \n");    
    }
}

class BoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla
        DB::table('departamentos')->delete();
        
        // Añadimos una entrada a esta tabla
        anyadirDep('Clinica Alicante', 'Odontologia');
        anyadirDep('Clinica Alicante', 'Ginecologia');
        anyadirDep('Clinica Alicante', 'Fisioterapia');
        anyadirDep('Clinica Alicante', 'Oncoligia');
        anyadirDep('Clinica Alicante', 'Radiografia');
                
    }
}
