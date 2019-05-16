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

        //for($i=0; $i<2; $i++){ //El seeder ocupa las fechas de las 9 durante 2 dias ocupando todos los boxes a esa hora
         //   for($j=0; $j<$boxCount; $j++){
          //  $ent= new Cita(['paciente_id' => 9, 'medico_id' => 3, 'box_id' => $j+1,
         //   'fecha' => $time, 'motivo' => 'Consulta',]);
         //   $ent->save();
         //   }
         //   $time =  Date('Y-m-d H:i:s', strtotime("+1 days",strtotime($time))); 
            
        //}

        for($i=0; $i<2; $i++){ //El seeder ocupa las fechas de las 9 durante 2 dias
            $time =  Date('d-m-Y H:i:s', strtotime("+1 days",strtotime($time))); 
            $ent= new Cita(['paciente_id' => 35, 'medico_id' => 3, 'box_id' => 1,
            'fecha' => $time, 'motivo' => 'Consulta',]);
            $ent->save();
        }
        $time =  Date('d-m-Y H:i:s', strtotime("+1 hours",strtotime($time))); 
        $ent= new Cita(['paciente_id' => 35, 'medico_id' => 3, 'box_id' => 1,
            'fecha' => $time, 'motivo' => 'Consulta',]);
        $ent->save();
    }
}
