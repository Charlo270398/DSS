<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentosController extends Controller
{
    public function mostrarDepartamentos() {
        
        $dep = Departamento::all(); // select * from users

        return view('/departamentos', ['departamentos' => $dep]);
    }
}
