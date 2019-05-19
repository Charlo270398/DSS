<?php

namespace App\BL;
use App\Entrada;
use App\BL\UserDAO;
use App\BL\CitaDAO;
use App\BL\DepartamentoDAO;
use App\BL\BoxDAO;

class EntradaDAO
{

    
    public function mostrarEntrada($id) {
        $entrada  = Entrada::findOrFail($id);
        return $entrada;
    }

    public function mostrarListaEntradas() {
        $entrada  = Entrada::all();
        return $entrada;
    }

    public function mostrarEntradasRecientes($id) {
        $entradas  = Entrada::where('paciente_id', '=', "$id")->orderBy('fecha', 'DESC')->get();//Ordenado por fecha de reciente a antiguo
        return $entradas;
    }
    public function mostrarEntradasAntiguas($id) {
        $entradas  = Entrada::where('paciente_id', '=', "$id")->orderBy('fecha')->get();//Ordenado por fecha de antiguo a reciente
        return $entradas;
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
