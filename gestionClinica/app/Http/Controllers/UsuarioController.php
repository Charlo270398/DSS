<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\BL\UserDAO;
use App\BL\CitaDAO;
use App\BL\EntradaDAO;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller
{
    public function autenticarUsuario(){
        
        if (Auth::check()) {
            $id = Auth::user()->id;
            $u = new UserDAO();
            $rol = $u->mostrarRol($id);
            if($rol->id != 1){//Medico y paciente
                $citas = $u->mostrarCitasHoy();
                if($citas == null){
                    $citasHoy=0;
                }else{
                    $citasHoy=count($citas);
                }
                return view('/user/menuusuario', ['tipo' => $rol, 'error' =>'', 'citas'=>$citasHoy]);
            }else{//Admin
                return view('/user/menuusuario', ['tipo' => $rol, 'error' =>'', 'citas'=>0]);
            }
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
                $e = new EntradaDAO();
                if($modo == 'antiguas'){
                    return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $e->mostrarEntradasAntiguas($id)]);
                }else{
                    return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $e->mostrarEntradasRecientes($id)]);
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
                }else if($modo == 'hoy'){
                    $citas = $u->mostrarCitasHoy($id);
                    $titulo = 'Citas para hoy';
                    $mostrarOrden = false;
                }
                else{
                    $citas = $u->mostrarCitasProximas($id);
                    $titulo = 'Citas pendientes';
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

    public function mostrarListaPacientes(){
        $u = new UserDAO();
        $med = $u->mostrarListaPacientes();
        return view('/user/paciente/lista2', ['pacientes' => $med->paginate(5)]);
    }

    public function mostrarListaPacientesPorNombre(Request $request){
        $u = new UserDAO();
        $med = $u->mostrarListaPacientesPorNombre($request->input('nombre'));
        return view('/user/paciente/lista2', ['pacientes' => $med->paginate(5)]);
    }

    public function mostrarListaPacientesPorDni(Request $request){
        $u = new UserDAO();
        $med = $u->mostrarListaPacientesPorDni($request->input('dni'));
        return view('/user/paciente/lista2', ['pacientes' => $med->paginate(5)]);
    }
}