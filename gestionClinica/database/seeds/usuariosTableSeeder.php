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
        
        //Usuario administrador

        $usuario= new Usuario(['dni' => '00000000A','nombre' => 'Admin', 'apellidos' =>'Admin',
        'email' => 'admin@gmail.com', 'num_colegiado' => null,'fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => null, 'rol_id' => $admin->id, 'pass' => '1234']);
        $usuario->save();

        //En esta sección metemos médicos

        $usuario= new Usuario(['dni' => '00000000B','nombre' => 'Medico1', 'apellidos' =>'ApellidosMedico1',
        'email' => 'medico1@gmail.com', 'num_colegiado' => '1','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        $usuario= new Usuario(['dni' => '00000001B','nombre' => 'Medico2', 'apellidos' =>'ApellidosMedico2',
        'email' => 'medico2@gmail.com', 'num_colegiado' => '2','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        $usuario= new Usuario(['dni' => '00000002B','nombre' => 'Medico3', 'apellidos' =>'ApellidosMedico3',
        'email' => 'medico3@gmail.com', 'num_colegiado' => '3','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        $usuario= new Usuario(['dni' => '00000003B','nombre' => 'Medico4', 'apellidos' =>'ApellidosMedico4',
        'email' => 'medico4@gmail.com', 'num_colegiado' => '4','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        $usuario= new Usuario(['dni' => '00000004B','nombre' => 'Medico5', 'apellidos' =>'ApellidosMedico5',
        'email' => 'medico5@gmail.com', 'num_colegiado' => '5','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();

        $usuario= new Usuario(['dni' => '00000005B','nombre' => 'Jorge', 'apellidos' =>'González Pérez',
        'email' => 'medico6@gmail.com', 'num_colegiado' => '6','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();

        $usuario= new Usuario(['dni' => '00000006B','nombre' => 'Raúl', 'apellidos' =>'Mataix Escrivá',
        'email' => 'medico7@gmail.com', 'num_colegiado' => '7','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        

        //En esta sección metemos pacientes

        $usuario= new Usuario(['dni' => '00000000C','nombre' => 'Usuario3', 'apellidos' =>'Apellidos3',
        'email' => 'usuario3@gmail.com', 'num_colegiado' => null,'fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => null, 'rol_id' => $paciente->id, 'pass' => '1234']);
        $usuario->save();
        
    }
}
