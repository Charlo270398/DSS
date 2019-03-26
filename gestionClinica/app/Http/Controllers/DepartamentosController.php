<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentosController extends Controller
{
    public function mostrarListaDepartamentos() {
        
        $dep = Departamento::orderBy('nombre')->get();//Los devuelve ordenados alfabéticamente

        return view('/departamento/lista', ['departamentos' => $dep]);
    }

    public function mostrarDepartamento($id) {
        $dep = Departamento::findOrFail($id);
        return view('/departamento/departamento', ['departamento' => $dep]);
    }
}
