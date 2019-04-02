<?php

namespace App\BL;
use App\Usuario;
use App\Rol;

class UsuarioDAO
{
    public function mostrarUsuario($id) {
        $user  = Usuario::findOrFail($id); //Puesto que solo tenemos clinica alicante usamos el primero
        return $user;
    }

    public function actualizarUsuario($user){
        try{
            $user->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function borrarUsuario($user){
        try{
            $user->delete();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function autenticarAdmin($id){
        try{
            $user  = Usuario::findOrFail($id); 
            $rol = Rol::where('nombre', 'like', 'Administrador')->first();
            if($user->rol_id == $rol->id){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $ex){
            return false;
        }
    }

    public function autenticarMedico($id){
        try{
            $user  = Usuario::findOrFail($id); 
            $rol = Rol::where('nombre', 'like', 'Medico')->first();
            if($user->rol_id == $rol->id){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $ex){
            return false;
        }
    }

    public function autenticarPaciente($id){
        try{
            $user  = Usuario::findOrFail($id); 
            $rol = Rol::where('nombre', 'like', 'Paciente')->first();
            if($user->rol_id == $rol->id){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $ex){
            return false;
        }
    }
}
?>
