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
        //LA password PARA TODOS LOS USUARIOS ES $2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO, en el seeder esta encriptada
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
        'departamento_id' => null, 'rol_id' => $admin->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $User->save();

        $User= new User(['dni' => '0000000XD','nombre' => 'Su Florentineza', 'apellidos' =>'DIOS',
        'email' => 'vivasuflorentineza@gmail.com', 'num_colegiado' => null,'fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => null, 'rol_id' => $admin->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $User->save();
    
        //En esta sección metemos médicos
        
        $usuario= new User(['dni' => '00000005B','nombre' => 'Jorge', 'apellidos' =>'González Pérez',
        'email' => 'jorgegonzalez@gmail.com', 'num_colegiado' => '6','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep1->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000006B','nombre' => 'Raúl', 'apellidos' =>'Mataix Escrivá',
        'email' => 'raulmataix@gmail.com', 'num_colegiado' => '7','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep2->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000007B','nombre' => 'Pedro', 'apellidos' =>'Martínez Gómez',
        'email' => 'pedromartinez@gmail.com', 'num_colegiado' => '8','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep3->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000008B','nombre' => 'Luis', 'apellidos' =>'Mendoza Colombina',
        'email' => 'luismendoza@gmail.com', 'num_colegiado' => '9','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep4->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000009B','nombre' => 'Maria Luisa', 'apellidos' =>'Carmona Pérez',
        'email' => 'marialuisacarmona@gmail.com', 'num_colegiado' => '10','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep5->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000001C','nombre' => 'Patricia', 'apellidos' =>'González Mallenco',
        'email' => 'patriciagonzalez@gmail.com', 'num_colegiado' => '11','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep6->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000002C','nombre' => 'Sergio', 'apellidos' =>'Moreno Cabral',
        'email' => 'sergiomoreno@gmail.com', 'num_colegiado' => '12','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep1->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000003C','nombre' => 'Antonio', 'apellidos' =>'Ruiz Estepona',
        'email' => 'antonioruiz@gmail.com', 'num_colegiado' => '13','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep2->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000004C','nombre' => 'José Luis', 'apellidos' =>'Méndez Arbilla',
        'email' => 'joseluismendez@gmail.com', 'num_colegiado' => '14','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep3->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000005C','nombre' => 'Elena', 'apellidos' =>'Izquierdo Montes',
        'email' => 'elenaizquierdo@gmail.com', 'num_colegiado' => '15','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep4->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000006C','nombre' => 'Laura', 'apellidos' =>'Goméz Villar',
        'email' => 'lauragomez@gmail.com', 'num_colegiado' => '16','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep5->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000007C','nombre' => 'Jennifer', 'apellidos' =>'Madrid Hernández',
        'email' => 'jennifermadrid@gmail.com', 'num_colegiado' => '17','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep6->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000008C','nombre' => 'Alba', 'apellidos' =>'Muñoz Albertos',
        'email' => 'albamuñoz@gmail.com', 'num_colegiado' => '18','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep1->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000009C','nombre' => 'Antonia', 'apellidos' =>'Bernabeú Moreno',
        'email' => 'antoniabernabeu@gmail.com', 'num_colegiado' => '19','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep2->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();    
        $usuario= new User(['dni' => '00000001D','nombre' => 'Miguel', 'apellidos' =>'Finisterra Puyol',
        'email' => 'miguelfinisterra@gmail.com', 'num_colegiado' => '20','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep3->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000002D','nombre' => 'Juan Alberto', 'apellidos' =>'Reyes Montero',
        'email' => 'juanalbertoreyes@gmail.com', 'num_colegiado' => '21','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep4->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000003D','nombre' => 'Pilar', 'apellidos' =>'Ruíz Jiménez',
        'email' => 'pilarruiz@gmail.com', 'num_colegiado' => '22','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep5->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000004D','nombre' => 'Esther', 'apellidos' =>'Montes Burgos',
        'email' => 'esthermontes@gmail.com', 'num_colegiado' => '23','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep6->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000005D','nombre' => 'Sergio', 'apellidos' =>'Pérez Barcelona',
        'email' => 'sergioperez@gmail.com', 'num_colegiado' => '24','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep1->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000007D','nombre' => 'Maria Dolores', 'apellidos' =>'Albeza Jiménez',
        'email' => 'mariadoloresalbeza@gmail.com', 'num_colegiado' => '26','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep3->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000008D','nombre' => 'Juan', 'apellidos' =>'Indio Manresa',
        'email' => 'juanindio@gmail.com', 'num_colegiado' => '27','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep4->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000009D','nombre' => 'Estefania', 'apellidos' =>'Didac Quintero',
        'email' => 'estefaniadidac@gmail.com', 'num_colegiado' => '28','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep5->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();
        $usuario= new User(['dni' => '00000001E','nombre' => 'Rebeca', 'apellidos' =>'Gómez Exevarria',
        'email' => 'rebecagomez@gmail.com', 'num_colegiado' => '29','fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => $dep6->id, 'rol_id' => $medico->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $usuario->save();

        //En esta sección metemos pacientes

        $User= new User(['dni' => '00000000C','nombre' => 'Luis', 'apellidos' =>'Suárez',
        'email' => 'mordisquitos@gmail.com', 'num_colegiado' => null,'fecha_nacimiento' => date('2015-10-10 10:10:10'),
        'departamento_id' => null, 'rol_id' => $paciente->id, 'password' => '$2y$10$lmh4A90v470PHSpmBXd6T.PaiyszLJNr1LCpby6IN4x50XXRImyQO']);
        $User->save();
        
    }
}
