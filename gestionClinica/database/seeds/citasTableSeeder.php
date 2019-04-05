<?php

use Illuminate\Database\Seeder;
use App\Cita;

class citasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('citas')->delete();

        $ent= new Cita(['paciente_id' => 9, 'medico_id' => 3,
         'fecha' => date('2017-12-10 10:10:10')]);
        $ent->save();
        $ent= new Cita(['paciente_id' => 9, 'medico_id' => 3,
         'fecha' => date('2017-10-10 10:10:10')]);
        $ent->save();
    }
}
