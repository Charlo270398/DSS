<?php

use Illuminate\Database\Seeder;
use App\Departamento;

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
        DB::table('departamentos')->delete();
        
        // Añadimos una entrada a esta tabla
        $departamento= new Departamento('Clinica Alicante', 'Odontologia');
        $departamento= new Departamento('Clinica Alicante', 'Ginecologia');
        $departamento= new Departamento('Clinica Alicante', 'Fisioterapia');
        $departamento= new Departamento('Clinica Alicante', 'Oncologia');
        $departamento= new Departamento('Clinica Alicante', 'Radiografia');
        $departamento= new Departamento('Clinica Alicante', 'Odontologia');
        //$departamento->save();  
    }
}
