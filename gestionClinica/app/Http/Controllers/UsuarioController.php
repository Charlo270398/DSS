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
}
