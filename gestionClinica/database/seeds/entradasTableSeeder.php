<?php

use Illuminate\Database\Seeder;
use App\Entrada;

class entradasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entradas')->delete();
        $time = date('d-m-Y H:i:s');
        $time =  Date('d-m-Y H:i:s', strtotime("09:00:00",strtotime($time)));

        for($i=0; $i<2; $i++){
            $time =  Date('d-m-Y H:i:s', strtotime("+1 days",strtotime($time))); 
            $ent= new Entrada(['paciente_id' => 35, 'medico_id' => 3, 'texto' =>'Texto prueba 2',
            'fecha' => $time]);
            $ent->save();
        }
        $time =  Date('d-m-Y H:i:s', strtotime("+1 hours",strtotime($time))); 
        $ent= new Entrada(['paciente_id' => 35, 'medico_id' => 4, 'texto' =>'Texto prueba 2',
        'fecha' => $time]);
        $ent->save();

    }
}
