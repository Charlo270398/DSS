<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\UsuarioDAO;

class UsuarioController extends Controller
{
    public function autenticarAdmin($id){
        $u = new UsuarioDAO();
        if($u->autenticarAdmin($id)){
            return view('/user/menuusuario', ['user' => $u->mostrarUsuario($id), 'tipo' => 'Administrador'] );
        }else{
            return view('/error', ['error' => 'Error autenticando administrador']);
        }  
    }

    public function autenticarMedico($id){
        //TODO
        return view('/error', ['error' => 'Error autenticando médico', 'tipo' => 'Medico']);
    }

    public function autenticarPaciente($id){
        $u = new UsuarioDAO();
        if($u->autenticarPaciente($id)){
            return view('/user/menuusuario', ['user' => $u->mostrarUsuario($id), 'tipo' => 'Paciente']);
        }else{
            return view('/error', ['error' => 'Error autenticando administrador']);
        }  
    }

    public function autenticarUsuario($id){
        $u = new UsuarioDAO();
        if($u->autenticar($id)){
            return view('/user/menuusuario', ['user' => $u->mostrarUsuario($id), 'tipo' => $u->mostrarRol($id)]);
        }else{
            return view('/error', ['error' => 'Error autenticando.']);
        }
        
    }
}
