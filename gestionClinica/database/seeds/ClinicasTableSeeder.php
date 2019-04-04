<?php

use Illuminate\Database\Seeder;
use App\Clinica;

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
        $clinica= new Clinica(['nombre' => 'Clinica Alicante', 'direccion' =>'C/Pascual 191 A',
         'fecha_inauguracion' => date('2015-10-10 10:10:10')]);
         // Guardamos datos en la tabla
        $clinica->save();
    }
}
