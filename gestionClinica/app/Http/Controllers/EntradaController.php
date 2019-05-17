<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\EntradaDAO;
use App\BL\UserDAO;
use App\Entrada;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class EntradaController extends Controller
{
    public function mostrarHistorialPaciente($idH) {

        if (Auth::check()) {
            $idU = Auth::user()->id;
            $h = new EntradaDAO();  
            $u = new UserDAO();   
            $d = new DepartamentoDAO();
            $historial = $h->mostrarHistorialPaciente($idH);
            if($historial->paciente_id == $idU){
                return view('');
                
            }else{
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($idU), 'error' =>'¡Error, sitio incorrecto!']);
            }
        }
        else{
            return redirect('/login');
        }
    }
}
