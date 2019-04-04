<?php

namespace App\BL;
use App\User;
use App\Rol;

class UserDAO
{
    public function mostrarUsuario($id) {
        $user  = User::findOrFail($id); //Puesto que solo tenemos clinica alicante usamos el primero
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

    public function mostrarRol($id){
        try{
            $user  = User::findOrFail($id); 
            $rol  = Rol::findOrFail($user->rol_id); 
            return $rol;
            
        }catch(\Exception $ex){
            return false;
        }
    }

    public function autenticar($id){
        try{
            $user  = User::findOrFail($id); 
            //TODO el tema contraseñas y tal, de momento pues podemos iniciar sesion
            if($user != null){
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
