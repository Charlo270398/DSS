<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\ClinicaDAO;
use App\Clinica;

class ClinicaController extends Controller
{
    public function mostrarEditForm() {
        $a = new ClinicaDAO();
        $cli = $a->mostrarClinica();
        return view('/clinica/editar', ['clinica' => $cli] );
    }
}
