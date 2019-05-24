<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\ClinicaDAO;
use App\BL\UserDAO;
use App\Clinica;
use Illuminate\Support\Facades\Auth;

class ClinicaController extends Controller
{
    public function mostrarEditarForm() {

        $u = new UserDAO();
        if (Auth::check()) {
            $id = Auth::user()->id;
            if($u->mostrarRol($id)->id==1){//ID ADMIN == 1
                $a = new ClinicaDAO();
                $cli = $a->mostrarClinica();
                return view('/clinica/editar', ['clinica' => $cli] );
            }else{
                error_log("Error, no se puede mostrar el edit form de clínica porque 
                            no se ha iniciado sesión como Administrador.", 0);
                return view('/user/menuusuario', ['citas' => 0, 'tipo' => $u->mostrarRol($id), 'error' =>'¡No puedes editar administrador!']);
            }  
        }
        else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
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
