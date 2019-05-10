<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\CitaDAO;
use App\BL\UserDAO;
use App\BL\DepartamentoDAO;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class CitasController extends Controller
{
    public function mostrarCita($idC) {

        if (Auth::check()) {
            $idU = Auth::user()->id;
            $c = new CitaDAO();  
            $u = new UserDAO();   
            $d = new DepartamentoDAO();
            return view('/user/citas/cita', ['cita' => $c->mostrarCita($idC), 'medico' => $u->mostrarUsuario($c->mostrarCita($idC)->medico_id), 
            'departamento' => $d->mostrarDepartamento($c->mostrarCita($idC)->medico_id)]);
        }
        else{

        }
    }
    public function borrarCita($idC) {
        $c = new CitaDAO();  
        return view('/user/citas/cita', ['cita' => $c->mostrarCita($idC), 'medico' => $u->mostrarUsuario($c->mostrarCita($idC)->medico_id), 
        'departamento' => $d->mostrarDepartamento($c->mostrarCita($idC)->medico_id)]);
    }
    public function mostrarCitasDisponibles($idM){

        $c = new CitaDAO();  
        $items = $c->mostrarHorario($idM);
        if (Auth::check()) {
            $id = Auth::user()->id;
            $u = new UserDAO();
            if($u->mostrarRol($id)->id==2){//ID PACIENTE = 2
                return view('/user/citas/disponibles', ['fechas' => $items]);
            }else{
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($id), 'error' =>'No puedes reservar citas porque no eres un paciente!']); 
            }
        }else{
            //Excepcion??
            return view('/error', ['error' => 'Error autenticando.']);
        }
    }

}
