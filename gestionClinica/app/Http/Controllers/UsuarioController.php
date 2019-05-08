<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\UserDAO;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function autenticarUsuario(){
        
        if (Auth::check()) {
            $id = Auth::user()->id;
            $u = new UserDAO();
            return view('/user/menuusuario', ['tipo' => $u->mostrarRol($id), 'error' =>'']);
        }else{
            return view('/error', ['error' => 'Error autenticando.']);
        }
        
    }
    
    public function mostrarFormAutenticacion(){
        return view('/user/login');
    }

    public function mostrarHistorial($modo){
        $u = new UserDAO();
        if (Auth::check()) {
            $id = Auth::user()->id;
            if($modo == 'antiguas'){
                return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $u->mostrarEntradasAntiguas($id)]);
            }else{
                return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $u->mostrarEntradasRecientes($id)]);
            }  
        }else{
            //Excepcion??
            return view('/error', ['error' => 'Error autenticando.']);
        }  
    }

    public function mostrarCitas($modo){

        if (Auth::check()) {
            $id = Auth::user()->id;
            $u = new UserDAO();
            if($modo == 'antiguas'){
                return view('/user/citas/lista', ['user' => $u->mostrarUsuario($id), 'citas' => $u->mostrarCitasAntiguas($id)]);
            }else{
                return view('/user/citas/lista', ['user' => $u->mostrarUsuario($id), 'citas' => $u->mostrarCitasRecientes($id)]);
            }
        }else{
            //Excepcion??
            return view('/error', ['error' => 'Error autenticando.']);
        }
    }

    public function mostrarCitasDisponibles(){
        return view('/user/citas/disponibles');
    }
}
