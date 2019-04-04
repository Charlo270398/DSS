<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\ClinicaDAO;
use App\Clinica;

class ClinicaController extends Controller
{
    public function mostrarEditarForm() {
        $a = new ClinicaDAO();
        $cli = $a->mostrarClinica();
        return view('/clinica/editar', ['clinica' => $cli] );
    }
    
    public function editarClinica(Request $request) {
        $c = new ClinicaDAO();
        $cli = $c->mostrarClinica();
        $cli->id = $request->input('id');
        $cli->nombre = $request->input('nombre');
        $cli->direccion = $request->input('direccion');
        $cli->fecha_inauguracion = $request->input('fecha_inauguracion');
       
            if($c->actualizarClinica($cli)){
                return view('/clinica/editar', ['clinica' => $cli] );
            }else{
                return view('/error', ['error' => 'Error actualizando.'] );
            }  
    }
}
