<?php

namespace App\BL;
use App\Box;

class BoxDAO
{
    public function mostrarBox($id) {
        $box  = Box::findOrFail($id)->first();
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
        try{
            $box = $this->mostrarBox($id);
            $box->delete();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
}
?>
