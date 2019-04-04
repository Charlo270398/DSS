<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rol;
use App\Departamento;

class UsersTableSeeder extends Seeder
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

        $dep1= Departamento::where('nombre', '=', 'Odontología')->first();
        $dep2= Departamento::where('nombre', '=', 'Ginecología')->first();
        $dep3= Departamento::where('nombre', '=', 'Fisioterapia')->first();
        $dep4= Departamento::where('nombre', '=', 'Oncología')->first();
        $dep5= Departamento::where('nombre', '=', 'Radioterapia')->first();
        $dep6= Departamento::where('nombre', '=', 'Dermatología')->first();
        $dep= Departamento::all();
        // Borramos los datos de la tabla
        DB::table('users')->delete();
        
        //User administrador

        $User= new User(['dni' => '00000000A','nombre' => 'Admin', 'apellidos' =>'Admin',
        'email' => 'admin@gmail.com', 'num_colegiado' => null,'fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => null, 'rol_id' => $admin->id, 'pass' => '1234']);
        $User->save();

        $User= new User(['dni' => '0000000XD','nombre' => 'Su Florentineza', 'apellidos' =>'DIOS',
        'email' => 'vivasuflorentineza@gmail.com', 'num_colegiado' => null,'fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => null, 'rol_id' => $admin->id, 'pass' => '1234']);
        $User->save();

        //En esta sección metemos médicos

        
        $usuario= new User(['dni' => '00000005B','nombre' => 'Jorge', 'apellidos' =>'González Pérez',
        'email' => 'medico6@gmail.com', 'num_colegiado' => '6','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep3->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        $usuario= new User(['dni' => '00000006B','nombre' => 'Raúl', 'apellidos' =>'Mataix Escrivá',
        'email' => 'medico7@gmail.com', 'num_colegiado' => '7','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep6->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        $usuario= new User(['dni' => '00000007B','nombre' => 'Pedro', 'apellidos' =>'Martínez Gómez',
        'email' => 'medico8@gmail.com', 'num_colegiado' => '8','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep5->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        $usuario= new User(['dni' => '00000008B','nombre' => 'Luis', 'apellidos' =>'Mendoza Colombina',
        'email' => 'medico9@gmail.com', 'num_colegiado' => '9','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep4->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        $usuario= new User(['dni' => '00000009B','nombre' => 'Maria Luisa', 'apellidos' =>'Carmona Pérez',
        'email' => 'medico10@gmail.com', 'num_colegiado' => '10','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep2->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        $usuario= new User(['dni' => '00000001C','nombre' => 'Patricia', 'apellidos' =>'González Mallenco',
        'email' => 'medico11@gmail.com', 'num_colegiado' => '11','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep3->id, 'rol_id' => $medico->id, 'pass' => '1234']);
        $usuario->save();
        

        //En esta sección metemos pacientes

        $User= new User(['dni' => '00000000C','nombre' => 'Luis', 'apellidos' =>'Suárez',
        'email' => 'mordisquitos@gmail.com', 'num_colegiado' => null,'fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => null, 'rol_id' => $paciente->id, 'pass' => '1234']);
        $User->save();
        
    }
}