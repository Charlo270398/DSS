<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Rol;
use App\User;

class DepartamentosController extends Controller
{
    public function mostrarListaDepartamentos() {
        
        $dep = Departamento::orderBy('nombre')->get(); //Los devuelve ordenados alfabéticamente

        return view('/departamento/lista', ['departamentos' => $dep]);
    }

    public function mostrarDepartamento($id) {

        $dep = Departamento::findOrFail($id);
        $rol = Rol::where('nombre', '=', 'Medico')->first();
        $users = User::where('rol_id', '=', $rol->id)->paginate(5); //bootstrap4.blade

        return view('/departamento/departamento', ['departamento' => $dep,'medicos' => $users]);
    }

}
