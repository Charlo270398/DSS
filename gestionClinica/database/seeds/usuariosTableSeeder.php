<?php

use Illuminate\Database\Seeder;
use App\Usuario;
use App\Rol;
use App\Departamento;

class usuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Carga de los roles
        $admin= Rol::where('nombre', '=', 'Administrador')->first();
        $medico= Rol::where('nombre', '=', 'Medico')->first();
        $paciente= Rol::where('nombre', '=', 'Paciente')->first();

        $dep= Departamento::where('nombre', '=', 'Ginecología')->first();
        // Borramos los datos de la tabla
        DB::table('usuarios')->delete();
        
        $usuario= new Usuario(['dni' => '00000000A','nombre' => 'Usuario1', 'apellidos' =>'Apellidos1',
        'email' => 'usuario1@gmail.com', 'num_colegiado' => '1','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $admin->id]);
        $usuario->save();

        $usuario= new Usuario(['dni' => '00000000B','nombre' => 'Usuario2', 'apellidos' =>'Apellidos1',
        'email' => 'usuario2@gmail.com', 'num_colegiado' => '2','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $paciente->id]);
        $usuario->save();

        $usuario= new Usuario(['dni' => '00000000C','nombre' => 'Usuario3', 'apellidos' =>'Apellidos1',
        'email' => 'usuario3@gmail.com', 'num_colegiado' => '3','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $medico->id]);
        $usuario->save();

        
    }
}
