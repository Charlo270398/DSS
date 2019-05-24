<?php
namespace App\ServicesLayer;
use Illuminate\Support\Facades\DB;
use App\Box;

class BorrarBox{
    public static function borrarBox($id){
        DB::beginTransaction();
            try{
                $box  = Box::findOrFail($id);
                $box->delete();
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