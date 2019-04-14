<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\UserDAO;

class UsuarioController extends Controller
{
    public function autenticarUsuario($id){
        $u = new UserDAO();
        if($u->autenticar($id)){
            return view('/user/menuusuario', ['user' => $u->mostrarUsuario($id), 'tipo' => $u->mostrarRol($id)]);
        }else{
            return view('/error', ['error' => 'Error autenticando.']);
        }
    }
    
    public function mostrarFormAutenticacion(){
        return view('/user/login');
    }

    public function mostrarHistorial($id, $modo){
        $u = new UserDAO();
        if($modo == 'antiguas'){
            return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $u->mostrarEntradasAntiguas($id)]);
        }else{
            return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $u->mostrarEntradasRecientes($id)]);
        }    
    }

    public function mostrarCitas($id, $modo){
        $u = new UserDAO();
        if($modo == 'antiguas'){
            return view('/user/citas/lista', ['user' => $u->mostrarUsuario($id), 'citas' => $u->mostrarCitasAntiguas($id)]);
        }else{
            return view('/user/citas/lista', ['user' => $u->mostrarUsuario($id), 'citas' => $u->mostrarCitasRecientes($id)]);
        }
    }
}
