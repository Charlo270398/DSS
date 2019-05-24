<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\BL\UserDAO;
use App\BL\CitaDAO;
use App\BL\EntradaDAO;
use App\User;
use App\Rol;
use App\Departamento;
use App\BL\DepartamentoDAO;

use Illuminate\Support\Facades\Hash;

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
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }

    }

    public function mostrarHistorial($modo){
        $u = new UserDAO();
        if (Auth::check()) {
            $id = Auth::user()->id;
            if($u->mostrarRol($id)->id==2){//ID PACIENTE = 2
                $e = new EntradaDAO();
                if($modo == 'antiguas'){
                    return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $e->mostrarEntradasAntiguas($id), 'medico' => false]);
                }else{
                    return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($id), 'entradas' => $e->mostrarEntradasRecientes($id), 'medico' => false]);
                }
            }else{
                error_log("Intento de acceso a un área sin tener permisos", 0);
                return view('/user/menuusuario', ['citas'=>0 , 'tipo' => $u->mostrarRol($id), 'error' =>'¡No puedes acceder al historial porque no eres un paciente!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }

    }
    public function editarPaciente(Request $request) {
        
        if (Auth::check()) {
            $u = new UserDAO();
            $user = new User();
            $user = $u->mostrarUsuario($request->input('id'));
            $user->dni = $request->input('dni');
            $user->nombre = $request->input('nombre');
            $user->password = Hash::make($request->input ('password'));
            $user->apellidos = $request->input('apellidos');
            $user->email = $request->input('email');
            $user->rol_id = 2;
            if($u->editarPaciente($user)){
                return redirect('/usuario' );
            }else{
                error_log("E-mail repetido al editar paciente", 0);
                return view('/user/paciente/editar', ['paciente'=>$user, 'error' => 'E-mail repetido'] );
            }
        }
        else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }

    public function mostrarEditUsuarioForm() {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $d = new UserDAO();
            if($d->mostrarRol($userId)->id==2){
                $dep = $d->mostrarUsuario($userId);
                return view("/user/paciente/editar", ['paciente' => $dep, 'error'=>''] );
            }
            else{
                return view('/user/menuusuario', ['citas'=>0, 'tipo' => $d->mostrarRol($userId), 'error' =>'¡No tienes permisos de administrador!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
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
                return view('/user/menuusuario', ['citas'=>0, 'tipo' => $u->mostrarRol($id), 'error' =>'¡No puedes acceder a las citas porque no eres un paciente!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }

    public function mostrarListaPacientes(){
        $u = new UserDAO();
        $pac = $u->mostrarListaPacientes();
        return view('/user/paciente/lista', ['pacientes' => $pac->paginate(5)]);
    }

    public function mostrarListaPacientesPorNombre(Request $request){
        $u = new UserDAO();
        $pac = $u->mostrarListaPacientesPorNombre($request->input('nombre'));
        return view('/user/paciente/lista', ['pacientes' => $pac->paginate(5)]);
    }

    public function mostrarListaPacientesPorDni(Request $request){
        $u = new UserDAO();
        $pac = $u->mostrarListaPacientesPorDni($request->input('dni'));
        return view('/user/paciente/lista', ['pacientes' => $pac->paginate(5)]);
    }

    public function mostrarPaciente($idP) {
        $u = new UserDAO();
        return view('/user/paciente/paciente', ['medico' => $u->mostrarUsuario($idP)]);
    }

}
