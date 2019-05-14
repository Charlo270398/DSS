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

        $ent= new Entrada(['user_id' => 9, 'texto' =>'Texto prueba',
         'fecha' => date('2015-10-10 10:10:10')]);
        $ent->save();
        $ent= new Entrada(['user_id' => 9, 'texto' =>'Texto prueba 2',
         'fecha' => date('2017-10-10 10:10:10')]);
        $ent->save();
        $ent= new Entrada(['user_id' => 9, 'texto' =>'Texto prueba 3',
         'fecha' => date('2012-10-10 10:10:10')]);
        $ent->save();
    }
}
