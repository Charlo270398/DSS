<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function mostrarListaMedicos() {
        
        return view('/medico/lista');
    }

    public function mostrarDepartamento($id) {
        
        return view('/medico/medico');
    }
}
