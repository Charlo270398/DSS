<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\BL\CitaDAO;
use App\BL\UserDAO;
use App\BL\EntradaDAO;
use App\BL\DepartamentoDAO;
use App\Entrada;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
class EntradasController extends Controller
{
    public function addEntrada(Request $request) {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $d = new UserDAO();
            if($d->mostrarRol($userId)->id==3){//ID MEDICO
                $e = new EntradaDAO();
                $entrada = new Entrada();
                $entrada->paciente_id = $request->input('paciente_id');
                $entrada->medico_id = $userId;
                $entrada->asunto = $request->input('asunto');
                $entrada->descripcion = $request->input('descripcion');
                $time = date('d-m-Y H:i:s');
                $time =  Date('d-m-Y H:i:s', strtotime("+2 hours",strtotime($time)));//COMPROBAR SI ESTÁ BIEN
                $entrada->fecha = $time;
                $e->addEntrada($entrada);
                //$entrada->save();
                return redirect('/usuario');
            }else{
                error_log("Intento de addEntrada sin ser médico", 0);
                return view('/user/menuusuario', ['citas' => 0, 'tipo' => $d->mostrarRol($userId), 'error' =>'¡No tienes permisos de médico!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }

    public function mostrarHistorialDePaciente($idP, $modo) {
        
        $u = new UserDAO();
        if (Auth::check()) {
            $id = Auth::user()->id;
            if($u->mostrarRol($id)->id==3){//ID MEDICO = 3
                $e = new EntradaDAO();
                if($modo == 'antiguas'){
                    return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($idP), 'entradas' => $e->mostrarEntradasAntiguas($idP), 'medico' => true]);
                }else{
                    return view('/user/paciente/historial/lista', ['user' => $u->mostrarUsuario($idP), 'entradas' => $e->mostrarEntradasRecientes($idP), 'medico' => true]);
                }  
            }else{
                error_log("Intento de mostrarHistorialDePaciente sin ser médico", 0);
                return view('/user/menuusuario', ['citas' => 0, 'tipo' => $u->mostrarRol($id), 'error' =>'No puedes acceder al historial porque no eres un médico!']);
            }  
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }

    public function mostrarEntrada($idE) {
        if (Auth::check()) {
            $idU = Auth::user()->id;
            $h = new EntradaDAO();  
            $u = new UserDAO();   
            $d = new DepartamentoDAO();
            $historial = $h->mostrarEntrada($idE);
            if($historial->paciente_id == $idU){
                return view('/user/paciente/historial/entrada', ['esmedico' => false, 'entrada' => $historial, 'medico' => $u->mostrarUsuario($historial->medico_id), 'paciente' => $u->mostrarUsuario($historial->paciente_id)]);
            }else{
                error_log("Error en mostrandoEntrada porque el id AUTH no es el propietario del historial", 0);
                return view('/user/menuusuario', ['citas' => 0,'tipo' => $u->mostrarRol($idU), 'error' =>'¡Error, sitio incorrecto!']);
            }
        }
        else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }

    public function mostrarEntradaPaciente($idP, $idE) {
        if (Auth::check()) {
            $idU = Auth::user()->id;
            $h = new EntradaDAO();  
            $u = new UserDAO();   
            $d = new DepartamentoDAO();
            $historial = $h->mostrarEntrada($idE);
            if($historial->paciente_id == $idP){
                return view('/user/paciente/historial/entrada', ['esmedico' => true, 'entrada' => $historial, 'medico' => $u->mostrarUsuario($historial->medico_id), 'paciente' => $u->mostrarUsuario($historial->paciente_id)]);
            }else{
                error_log("Intento de acceso a mostrarEntradaPaciente con una paciente distinto al paciente propietario de la entrada", 0);
                return view('/user/menuusuario', ['citas' => 0,'tipo' => $u->mostrarRol($idU), 'error' =>'¡Error, sitio incorrecto!']);
            }
        }
        else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }

    public function mostrarAddEntradaForm($pacienteId) {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $d = new UserDAO();
            if($d->mostrarRol($userId)->id==3){
                return view('/user/paciente/historial/add', ['usuario' => $d->mostrarUsuario($pacienteId)] );
            }
            else{
                error_log("Intento de acceso a mostrarAddEntradaForm sin ser médico", 0);
                return view('/user/menuusuario', ['citas' => 0,'tipo' => $d->mostrarRol($userId), 'error' =>'¡No tienes permisos de médico!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }
}