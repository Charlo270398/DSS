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
        $u = new UserDAO();
        $validado = true;

        if($u->mostrarUsuario($idMedico)->rol_id != 3){//El medico que se mete es medico
            $validado = false;
        }

        if(strlen($hora)!=5){//La longitud de hora que se mete es de 5 si o si
            $validado = false;
        }

        if(substr($hora, 0, 2) != '09' && substr($hora, 0, 2) != '10' && substr($hora, 0, 2) != '11'  //Horas que no estén dentro del horario correcto
        && substr($hora, 0, 2) != '12' && substr($hora, 0, 2) != '13'){
            $validado = false;
        }

        if(substr($hora, 3, 5) != '00' && substr($hora, 3, 5) != '20' && substr($hora, 3, 5) != '40'){//Solo se puede reservar a en punto, y 20 e y 40
            $validado = false;
        }

        if(strlen($dia)!=10){//La longitud del dia que se mete es de 10 si o si
            $validado = false;
        }

        $validado = false;
        $time = date('Y-m-d');
        for($i=0; $i<7; $i++){ //7 proximos dias
            if($time == $dia && 'Saturday' != date("l", strtotime($time)) && 'Sunday' != date("l", strtotime($time))){ //El día está dentro del intervalo y no es Sabado ni Domingo
                $validado = true;
            }
            $time =  Date('Y-m-d', strtotime("+1 days",strtotime($time)));
        }

        if (Auth::check() && $validado) {
            $idU = Auth::user()->id;
            $c = new CitaDAO();
            $d = new DepartamentoDAO();
            $cita = $c->generarCita($dia, $hora, $idMedico);
            if($u->mostrarRol($idU)->id==2){//ID 2 de paciente
                if($cita == null){//Cita no disponible (porque no hay boxes)
                    return $this->mostrarCitasDisponiblesError($idMedico, 'No hay boxes disponibles para esa fecha');
                }else{
                    return view('/user/citas/confirmar', ['cita' => $cita, 'medico' => $u->mostrarUsuario($idMedico),
                'departamento' => $d->mostrarDepartamento($u->mostrarUsuario($idMedico)->departamento_id)]);
                }
            }
            else{
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($idU), 'error' =>'No puedes reservar citas porque no eres un paciente!']);
            }
        }else{
            return view('/home');
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
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($id), 'error' =>'¡No puedes reservar citas porque no eres un paciente!']);
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
