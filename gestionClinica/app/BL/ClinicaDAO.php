<?php

namespace App\BL;
use App\Clinica;

class ClinicaDAO
{
    public function mostrarClinica() {
        $cli  = Clinica::all()->first(); //Puesto que solo tenemos clinica alicante usamos el primero
        return $cli;
    }

    public function actualizarClinica($cli){
        try{
            $cli->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
}
?>
