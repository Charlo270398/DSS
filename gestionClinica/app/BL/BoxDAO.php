<?php

namespace App\BL;
use App\Box;
use App\Cita;
use App\ServicesLayer\BorrarBox;

class BoxDAO
{
    public function comprobarCitasHora($dia, $hora){
        $fecha = $dia . ' ' . $hora . ':00';
        $c = Cita::where('fecha', '=', $fecha)->count();
        return $c; 
    }

    public function devolverDisponible($dia, $hora){
        $fecha = $dia . ' ' . $hora . ':00';
        $c = Cita::where('fecha', '=', $fecha)->count();
        $b = Box::all()->count();
        
        if($c == $b){//Si estan todos llenos
            return -1;
        }else{
            $cList = Cita::where('fecha', '=', $fecha)->get();
            $bList = Box::all();
            $boxesCitas = array();

            foreach ($cList as $cValue) {
                array_push($boxesCitas, $cValue->box_id);
            }

            foreach ($bList as $bValue) {
                if(in_array($bValue->id, $boxesCitas) == false) {
                    return $bValue->id;
                }
            }
            
            return -1; 
        }
        
    }


    public function mostrarBox($id) {
        $box  = Box::findOrFail($id);
        return $box;
    }

    public function mostrarListaBoxesOrdenadosPorNum() {
        $boxes  = Box::orderBy('numero')->get();
        return $boxes;
    }

    public function mostrarListaBoxes() {
        $boxes  = Box::all();
        return $boxes;
    }

    public function actualizarBox($box){
        try{
            $box->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function addBox($box){
        try{
            $box->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function borrarBox($id){
        return (BorrarBox::borrarBox($id));
        /* try{
            $box = $this->mostrarBox($id);
            $box->delete();
            return true;
        }catch(\Exception $ex){
            return false;
        } */
    }
}
?>
