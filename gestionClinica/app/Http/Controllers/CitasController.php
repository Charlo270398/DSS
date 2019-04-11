<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\CitaDAO;
use App\BL\UserDAO;
use App\BL\DepartamentoDAO;

class CitasController extends Controller
{
    public function mostrarCita($idU, $idC) {
        $c = new CitaDAO();  
        $u = new UserDAO();   
        $d = new DepartamentoDAO();
        return view('/user/citas/cita', ['cita' => $c->mostrarCita($idC), 'medico' => $u->mostrarUsuario($c->mostrarCita($idC)->medico_id), 
        'departamento' => $d->mostrarDepartamento($c->mostrarCita($idC)->medico_id)]);
    }
    public function borrarCita($idU, $idC) {
        $c = new CitaDAO();  
        return view('/user/citas/cita', ['cita' => $c->mostrarCita($idC), 'medico' => $u->mostrarUsuario($c->mostrarCita($idC)->medico_id), 
        'departamento' => $d->mostrarDepartamento($c->mostrarCita($idC)->medico_id)]);
    }

}
