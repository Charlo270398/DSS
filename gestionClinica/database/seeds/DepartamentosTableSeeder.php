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
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Odontología', 'imagen' => '/images/departamentos/odontologia.jpg']);
        $departamento->save();  
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Ginecología', 'imagen' => '/images/departamentos/ginecologia.jpg']);
        $departamento->save();  
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Fisioterapia', 'imagen' => '/images/departamentos/fisioterapia.jpg']);
        $departamento->save();  
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Oncología', 'imagen' => '/images/departamentos/oncologia.jpg']);
        $departamento->save();  
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Radioterapia', 'imagen' => '/images/departamentos/radioterapia.jpg']);
        $departamento->save();  
        $departamento= new Departamento(['clinica_id' => $clinica->id, 'nombre' => 'Dermatología', 'imagen' => '/images/departamentos/dermatologia.jpg']);
        $departamento->save(); 
    }
}
