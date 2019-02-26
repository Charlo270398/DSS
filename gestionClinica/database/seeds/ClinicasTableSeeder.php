<?php

use Illuminate\Database\Seeder;

class ClinicasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla
        DB::table('clinicas')->delete();
        // Añadimos una entrada a esta tabla
        DB::table('clinicas')->insert(['nombre'=>'Clinica Alicante', 'direccion'=>'C/Pascual 191 A', 'fecha_inauguracion' => date('2010-10-10 10:10:10')]);
    }
}
