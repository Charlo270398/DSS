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
                return view('/user/menuusuario', ['tipo' => $d->mostrarRol($userId), 'error' =>'¡No tienes permisos de médico!']);
            }
        }else{
            return redirect('/home');
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
            //Excepcion??
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($id), 'error' =>'No puedes acceder al historial porque no eres un médico!']);
            }  
        }else{
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
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($idU), 'error' =>'¡Error, sitio incorrecto!']);
            }
        }
        else{
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
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($idU), 'error' =>'¡Error, sitio incorrecto!']);
            }
        }
        else{
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
                return view('/user/menuusuario', ['tipo' => $d->mostrarRol($userId), 'error' =>'¡No tienes permisos de médico!']);
            }
        }
    }
}