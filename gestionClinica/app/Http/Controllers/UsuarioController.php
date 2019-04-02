<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\UsuarioDAO;

class UsuarioController extends Controller
{
    public function autenticarAdmin($id){
        $u = new UsuarioDAO();
        if($u->autenticarAdmin($id)){
            return view('/user/menuadmin', ['user' => $u->mostrarUsuario($id)]);
        }else{
            return view('/error', ['error' => 'Error autenticando administrador']);
        }  
    }

    public function autenticarMedico($id){
        //TODO
        return view('/error', ['error' => 'Error autenticando médico']);
    }

    public function autenticarPaciente($id){
        //TODO
        return view('/error', ['error' => 'Error autenticando paciente']);
    }
}
