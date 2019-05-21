<?php
namespace App\ServicesLayer;
use Illuminate\Support\Facades\DB;

class Editar{
    public static function editarPacientes($user){
        DB::beginTransaction();
            try{
                $user->save();
                DB::commit();
                return true;
            }catch(\Exception $ex){
                DB::rollBack();
                return false;

            }
    }
}
