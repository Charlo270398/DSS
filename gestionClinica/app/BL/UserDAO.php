<?php
namespace App\BL;
use App\User;
use App\Rol;
use App\Entrada;
use App\Cita;
use App\Departamento;
use Illuminate\Support\Facades\Auth;

class UserDAO
{
    public function mostrarUsuario($id) {
        $user  = User::findOrFail($id);
        return $user;
    }
    public function mostrarListaUsuarios() {
        $user  = User::orderBy('apellidos');//Ordenado por apelidos
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
    public function addMedico($user){
        try{
            $user->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
    
    public function borrarUsuario($id){
        try{
            $user = $this->mostrarUsuario($id);
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
    public function mostrarEntradasRecientes($id) {
        $entradas  = Entrada::orderBy('fecha', 'DESC')->get();//Ordenado por fecha de reciente a antiguo
        return $entradas;
    }
    public function mostrarEntradasAntiguas($id) {
        $entradas  = Entrada::orderBy('fecha')->get();//Ordenado por fecha de antiguo a reciente
        return $entradas;
    }
    public function mostrarCitasRecientes() {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $u = new UserDAO();
            if($u->mostrarRol($id)->id==2){//ID PACIENTE = 2
                $cita  = Cita::orderBy('fecha', 'DESC')->where('paciente_id', '=', "$id")->get();//Ordenado por fecha de antiguo a reciente
            }else{
                $cita  = Cita::orderBy('fecha', 'DESC')->where('medico_id', '=', "$id")->get();//Ordenado por fecha de antiguo a reciente
            }
        }
        return $cita;
    }
    public function mostrarCitasAntiguas() {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $u = new UserDAO();
            if($u->mostrarRol($id)->id==2){//ID PACIENTE = 2
                $cita  = Cita::orderBy('fecha')->where('paciente_id', '=', "$id")->get();//Ordenado por fecha de antiguo a reciente
            }else{
                $cita  = Cita::orderBy('fecha')->where('medico_id', '=', "$id")->get();//Ordenado por fecha de antiguo a reciente
            }
        }
        return $cita;
    }
    //Exclusivo de médico
    public function mostrarDepartamento($id){
            $user  = User::findOrFail($id); 
            $dep  = Departamento::findOrFail($user->departamento_id); 
            return $dep;
    }
    public function mostrarListaMedicos(){
        try{
            $rol = Rol::where('nombre', '=', 'Medico')->first();
            $users = User::orderBy('apellidos')->where('rol_id', '=', $rol->id);
            return $users;
            
        }catch(\Exception $ex){
            return false;
        }
    }

    public function mostrarListaMedicosPorNombre($nombre){
        try{
            $rol = Rol::where('nombre', '=', 'Medico')->first();
            $users = User::whereRaw("(apellidos like  '%$nombre%' or  nombre like  '%$nombre%') and rol_id == $rol->id ");
            return $users;
            
        }catch(\Exception $ex){
            return false;
        }
    }

    public function citaToday(){

        return false;
    }
 
    
}
?>