<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\DepartamentoDAO;
use App\BL\UserDAO;

class DepartamentosController extends Controller
{
    public function mostrarListaDepartamentos() {
        
        $d = new DepartamentoDAO();
        return view('/departamento/lista', ['departamentos' => $d->mostrarListaDepartamentos()]); //La devuelve Alfabeticamente por defecto
    }

    public function mostrarDepartamento($id) {

        $d = new DepartamentoDAO();
     

        return view('/departamento/departamento', ['departamento' => $d->mostrarDepartamento($id),'medicos' => $d->mostrarMedicosDepartamento($id)]);
    }

}
