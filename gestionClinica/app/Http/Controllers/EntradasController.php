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

    public function mostrarHistorialPaciente($idH) {

        if (Auth::check()) {
            $idU = Auth::user()->id;
            $h = new EntradaDAO();  
            $u = new UserDAO();   
            $d = new DepartamentoDAO();
            $historial = $h->mostrarHistorialPaciente($idH);
            if($historial->paciente_id == $idU){
                return view('');
                
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
