<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\CitaDAO;
use App\BL\UserDAO;
use App\Cita;
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

    public function mostrarConfirmarCita($dia, $hora, $idMedico){

        //Hay que comprobar que la long de los string de dia y hora 
        //Hay que comprobar que los dias son correctos 
        //Hay que comprobar que las horas son correctas, solo a en punto, y 20 y menos 20 

        if (Auth::check()) {
            $idU = Auth::user()->id;
            $c = new CitaDAO();  
            $u = new UserDAO();   
            $d = new DepartamentoDAO();
            $cita = $c->generarCita($dia, $hora, $idMedico);
            if($cita == null){//Cita no disponible (porque no hay boxes)      
                return $this->mostrarCitasDisponiblesError($idMedico, 'No hay boxes disponibles para esa fecha');
            }else{
                return view('/user/citas/confirmar', ['cita' => $cita, 'medico' => $u->mostrarUsuario($idMedico), 
            'departamento' => $d->mostrarDepartamento($idMedico)]);
            }
            
        }
    }

    public function confirmarCita($dia, $hora, $idMedico){

        //Hay que comprobar que la long de los string de dia y hora 
        //Hay que comprobar que los dias son correctos 
        //Hay que comprobar que las horas son correctas, solo a en punto, y 20 y menos 20 

        if (Auth::check()) {
            $idU = Auth::user()->id;
            $c = new CitaDAO();  
            $u = new UserDAO();   
            $d = new DepartamentoDAO();
            $cita = $c->generarCita($dia, $hora, $idMedico);
            if($cita == null){//Cita no disponible (porque no hay boxes)      
                return $this->mostrarCitasDisponiblesError($idMedico, 'No hay boxes disponibles para esa fecha');
            }else{
                return view('/user/citas/confirmar', ['cita' => $cita, 'medico' => $u->mostrarUsuario($idMedico), 
            'departamento' => $d->mostrarDepartamento($idMedico)]);
            }
            
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
                return view('/user/citas/disponibles', ['error' =>'', 'fechas' => $items, 'idMedico' => $idM]);
            }else{
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($id), 'error' =>'No puedes reservar citas porque no eres un paciente!']); 
            }
        }else{
            //Excepcion??
            return view('/error', ['error' => 'Error autenticando.']);
        }
    }

    public function mostrarCitasDisponiblesError($idM, $error){//Básicamente copypaste de mostrarCitasDisponibles pero introduciendo datos en error

        $c = new CitaDAO();  
        $items = $c->mostrarHorario($idM);
        if (Auth::check()) {
            $id = Auth::user()->id;
            $u = new UserDAO();
            if($u->mostrarRol($id)->id==2){//ID PACIENTE = 2
                return view('/user/citas/disponibles', ['error' =>$error, 'fechas' => $items, 'idMedico' => $idM]);
            }else{
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($id), 'error' =>'No puedes reservar citas porque no eres un paciente!']); 
            }
        }else{
            //Excepcion??
            return view('/error', ['error' => 'Error autenticando.']);
        }
    }

    public function reservar(Request $request) {

        if (Auth::check()) {

            $id = Auth::user()->id;
           
            $cita = new Cita();
            $cita->medico_id = $request->input('idM');
            $cita->paciente_id = $id;
            $cita->box_id = $request->input('idB');
            $cita->fecha = $request->input('fecha');
            $cita->motivo = $request->input('motivo');
            $cita->save();
            
            return redirect('/citas&recientes');
        }else{
            return redirect('/home');
        }
    }

}
