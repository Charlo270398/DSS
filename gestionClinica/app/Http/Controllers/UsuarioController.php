<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\BL\UserDAO;
use App\BL\CitaDAO;
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
            if($u->mostrarRol($id)->id==2){//ID PACIENTE = 2
                if($modo == 'antiguas'){
                    return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $u->mostrarEntradasAntiguas($id)]);
                }else{
                    return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $u->mostrarEntradasRecientes($id)]);
                }  
            }else{
            //Excepcion??
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($id), 'error' =>'No puedes acceder al historial porque no eres un paciente!']);
            }  
        }
        
    }
    public function mostrarCitas($modo){
        if (Auth::check()) {
            $id = Auth::user()->id;
            $u = new UserDAO();
            $c = new CitaDAO();
            if($u->mostrarRol($id)->id==2 || $u->mostrarRol($id)->id==3){//ID PACIENTE = 2, MEDICO = 3
                if($modo == 'antiguas'){
                    $citas = $u->mostrarCitasAntiguas($id);
                    $titulo = 'Historial de citas';
                    $mostrarOrden = true;
                }else if($modo == 'recientes'){
                    $citas = $u->mostrarCitasRecientes($id);
                    $titulo = 'Historial de citas';
                    $mostrarOrden = true;
                }else{
                    $citas = $u->mostrarCitasProximas($id);
                    $titulo = 'Reservas pendientes';
                    $mostrarOrden = false;
                }
                
                if($u->mostrarRol($id)->id==2){//Si es paciente en la tabla indica con que medico tiene la cita y viceversa
                    $perfil = 'Médico';
                    $nombres = $c->nombresCitas($citas, true);
                }else{
                    $perfil = 'Paciente';
                    $nombres = $c->nombresCitas($citas, false);
                }
                
                return view('/user/citas/lista', ['citas' => $citas, 'perfil'=> $perfil, 'nombre'=> $nombres, 'titulo' => $titulo, 'orden' => $mostrarOrden]);

            }else{
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($id), 'error' =>'¡No puedes acceder a las citas porque no eres un paciente!']); 
            }
        }else{
            //Excepcion??
            return view('/error', ['error' => 'Error autenticando.']);
        }
    }
}