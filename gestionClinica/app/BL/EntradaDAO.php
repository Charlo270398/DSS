<?php

namespace App\BL;
use App\Entrada;

class EntradaDAO
{

    public function mostrarEntrada($id) {
        $Entrada  = Entrada::findOrFail($id);
        return $Entrada;
    }

    public function mostrarListaEntradas() {
        $entrada  = Entrada::all();
        return $entrada;
    }

    public function actualizarEntrada($Entrada){
        try{
            $Entrada->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function addEntrada($entrada){
        try{
            $entrada->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function borrarEntrada($id){
        try{
            $entrada = $this->mostrarEntrada($id);
            $entrada->delete();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
}
?>
