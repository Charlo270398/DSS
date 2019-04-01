<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Rol;

class MedicosController extends Controller
{
    public function mostrarListaMedicos(){
        $rol = Rol::where('nombre', '=', 'Medico')->first();
        $users = Usuario::where('rol_id', '=', $rol->id)->paginate(3); //bootstrap4.blade
        return view('/medico/lista', ['medicos' => $users]);
    }

    public function mostrarListaMedicosDepartamento($id_dep){
       //TODO
    }

    public function mostrarMedico($id) {
        $user = Usuario::findOrFail($id);
        return view('/medico/medico', ['medico' => $user]);
    }
}
