<?php
namespace App\ServicesLayer;
use Illuminate\Support\Facades\DB;

class BorrarBox{
    public static function borrarBox($id){
        DB::beginTransaction();
            try{
                
                
                //$user->save();
                DB::commit();
                return true;
            }catch(\Exception $ex){
                DB::rollBack();
                return false;

            }
    }
}

?>