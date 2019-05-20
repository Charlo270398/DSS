<?php
namespace App\ServiceLayer;
use Illluminate\Support\Facades\DB;

class editar{
    public static function editarPacientes($user){
        $rollback =false;

        DB::beginTransaction();
            try{
                $user->save();
                $rollback=true;
            }catch(\Exception $ex){
                $rollback=false;
            }
        if($rollback){
            DB::rollBack();
            return false;
        }
        else{
            DB::commit();
            return true;
        }

    }
}
