<?php

namespace App\BL;
use App\Box;

class BoxDAO
{
    public function mostrarBox($id) {
        $box  = Box::findOrFail($id)->first(); 
        return $box;
    }

    public function mostrarLixtaBoxesOrdenadosPorNum() {
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

    public function borrarBox($box){
        try{
            $box->delete();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
}
?>
