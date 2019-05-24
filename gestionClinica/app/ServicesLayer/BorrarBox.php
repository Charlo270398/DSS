<?php
namespace App\ServicesLayer;
use Illuminate\Support\Facades\DB;
use App\Box;
use App\BL\BoxDAO;
use App\Cita;

class BorrarBox{
    public static function borrarBox($id){
        DB::beginTransaction();
            try{//Si está libre
                $box  = Box::findOrFail($id);
                $box->delete();
                DB::commit();
                return true;
            }catch(\Exception $ex){
                try{//Si está siendo ocupado
                    $citas = Cita::all();
                    $boxD = new BoxDAO();
                    foreach($citas as $cita){
                        $dia=substr($cita->fecha,0,10);
                        $hora=substr($cita->fecha, -8, -3);
                        $nuevoBox = $boxD->devolverDisponible($dia, $hora);
                        if($nuevoBox!=-1){
                            $cita->box_id = $nuevoBox;
                            $cita->save();
                        }
                    }
                    $box->delete();
                    DB::commit();
                    return true;
                }catch(\Exception $ex){//Si no se puede cambiar el box en alguna fecha
                    DB::rollBack();
                    error_log("Error borrando un box:", 0);
                    error_log($ex, 0);
                    return false;
                }
            }
    }
}

?>