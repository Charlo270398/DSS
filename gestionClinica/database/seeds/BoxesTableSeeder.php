<?php

use Illuminate\Database\Seeder;
use App\Box;
use App\Clinica;

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
        $clinica= Clinica::where('nombre', '=', 'Clinica Alicante')->first();
        // Borramos los datos de la tabla
        DB::table('boxes')->delete();
        
        // Añadimos una entrada a esta tabla
        $box= new Box(['numero' => 1, 'id_clinica' => $clinica->id]);
        $box->save();
        $box= new Box(['numero' => 2, 'id_clinica' => $clinica->id]);
        $box->save();
        $box= new Box(['numero' => 3, 'id_clinica' => $clinica->id]);
        $box->save();
        $box= new Box(['numero' => 4, 'id_clinica' => $clinica->id]);
        $box->save();
        $box= new Box(['numero' => 5, 'id_clinica' => $clinica->id]);
        $box->save();
        $box= new Box(['numero' => 6, 'id_clinica' => $clinica->id]);
        $box->save();
            
    }
}
