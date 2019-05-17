<?php

namespace App\BL;
use App\Entrada;
use App\BL\UserDAO;
use App\BL\CitaDAO;
use App\BL\DepartamentoDAO;
use App\BL\BoxDAO;

class EntradaDAO
{
    public function mostrarHistorial($id) {
        $historial  = Entrada::findOrFail($id);
        return $historial;
    }

}
?>