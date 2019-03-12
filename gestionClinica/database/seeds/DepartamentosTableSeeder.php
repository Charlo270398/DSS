<?php
use Illuminate\Database\Seeder;
use App\Departamento;
use App\Clinica;

function anyadirBox($cli, $num){
    $clinica= DB::table('clinicas')->where('nombre', $cli)->first();
    if($clinica != null){
        DB::table('boxes')->insert(['numero' => $num, 'clinica_id'=>$clinica->id]);
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
        $clinica= Clinica::where('nombre', '=', 'Clinica Alicante')->first();
        
		// Borramos los datos de la tabla
        DB::table('departamentos')->delete();   
        // Añadimos una entrada a esta tabla
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Odontologia']);
        $departamento->save();  
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Ginecologia']);
        $departamento->save();  
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Fisioterapia']);
        $departamento->save();  
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Oncologia']);
        $departamento->save();  
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Radiografia']);
        $departamento->save();  
    }
}
