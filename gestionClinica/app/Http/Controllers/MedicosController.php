<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\Departamento;

class MedicosController extends Controller
{
    public function mostrarListaMedicos(){
        $rol = Rol::where('nombre', '=', 'Medico')->first();
        $users = User::where('rol_id', '=', $rol->id)->paginate(5); //bootstrap4.blade
        return view('/user/medico/lista', ['medicos' => $users]);
    }

    public function mostrarListaMedicosPorNombre($nombre){
        $rol = Rol::where('nombre', '=', 'Medico')->first();
        $users = User::whereRaw("apellidos like  '%$nombre%' collate utf8_general_ci ")->where('rol_id', '=', $rol->id)->paginate(5); //bootstrap4.blade
        return view('/user/medico/lista', ['medicos' => $users]);
    }

    public function mostrarListaMedicosDepartamento($id_dep){
       //TODO
    }

    public function mostrarMedico($id) {
        $user = User::findOrFail($id);
        $dep = Departamento::findOrFail($user->departamento_id);
        return view('/user/medico/medico', ['medico' => $user, 'departamento' => $dep]);
    }
}
