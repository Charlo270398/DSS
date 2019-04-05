<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BL\UserDAO;
use App\Rol;
use App\Departamento;

class MedicosController extends Controller
{
    public function mostrarListaMedicos(){
        $u = new UserDAO();
        return view('/user/medico/lista', ['medicos' => $u->mostrarListaMedicos()->paginate(5)]);
    }

    public function mostrarListaMedicosPorNombre($nombre){
        $u = new UserDAO();
        return view('/user/medico/lista', ['medicos' => $u->mostrarListaMedicosPorNombre($nombre)->paginate(5)]);
    }

    public function mostrarMedico($id) {
        $u = new UserDAO();     
        return view('/user/medico/medico', ['medico' => $u->mostrarUsuario($id), 'departamento' => $u->mostrarDepartamento($id)]);
    }
}
