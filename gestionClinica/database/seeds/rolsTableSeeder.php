<?php

use Illuminate\Database\Seeder;

use App\Rol;


class rolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->delete();

        $rol= new Rol(['nombre' => 'Administrador']);
        $rol->save();
        $rol= new Rol(['nombre' => 'Paciente']);
        $rol->save();
        $rol= new Rol(['nombre' => 'Medico']);
        $rol->save();

    }
}
