<?php

namespace App\BL;
use App\Clinica;

class ClinicaDAO
{
    public function mostrarClinica() {
        $cli  = Clinica::findOrFail(1)->first();
        return $cli;
    }
}
?>
