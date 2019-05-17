<?php

use Illuminate\Database\Seeder;
use App\Cita;
use App\Box;

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

        $time = date('d-m-Y H:i:s');
        $time =  Date('d-m-Y H:i:s', strtotime("09:00:00",strtotime($time)));
        $boxCount = Box::all()->count();

        for($i=0; $i<2; $i++){ 
            $time =  Date('d-m-Y H:i:s', strtotime("+1 days",strtotime($time))); 
            $ent= new Cita(['paciente_id' => 35, 'medico_id' => 3, 'box_id' => 1,
            'fecha' => $time, 'motivo' => 'Consulta',]);
            $ent->save();
        }
        $time =  Date('d-m-Y H:i:s', strtotime("+1 hours",strtotime($time))); 
        $ent= new Cita(['paciente_id' => 35, 'medico_id' => 4, 'box_id' => 1,
            'fecha' => $time, 'motivo' => 'Consulta',]);
        $ent->save();
    }
}
