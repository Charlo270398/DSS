<?php

namespace App\BL;
use App\Cita;

class CitaDAO
{
    public function mostrarCita($id) {
        $cita  = Cita::findOrFail($id);
        return $cita;
    }

    public function mostrarListaCitas() {
        $citas  = Cita::all();
        return $citas;
    }

    public function actualizarCita($cita){
        try{
            $cita->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function addCita($cita){
        try{
            $cita->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function borrarCita($id){
        try{
            $cita = $this->mostrarCita($id);
            $cita->delete();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
}
?>
