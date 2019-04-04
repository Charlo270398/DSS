<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\DepartamentoDAO;
use App\BL\UserDAO;


class DepartamentosController extends Controller
{
    public function mostrarListaDepartamentos() {
        
        $d = new DepartamentoDAO();
        return view('/departamento/lista', ['departamentos' => $d->mostrarListaDepartamentos(), 'op' => 'mostrar']); //La devuelve Alfabeticamente por defecto
    }

    public function mostrarListaDepartamentosEditar() {
        
        $d = new DepartamentoDAO();
        return view('/departamento/lista', ['departamentos' => $d->mostrarListaDepartamentos(), 'op' => 'editar']); //La devuelve Alfabeticamente por defecto
    }

    public function mostrarListaDepartamentosBorrar() {
        
        $d = new DepartamentoDAO();
        return view('/departamento/lista', ['departamentos' => $d->mostrarListaDepartamentos(), 'op' => 'borrar']); //La devuelve Alfabeticamente por defecto
    }

    public function mostrarDepartamento($id) {

        $d = new DepartamentoDAO();
        return view('/departamento/departamento', ['departamento' => $d->mostrarDepartamento($id),'medicos' => $d->mostrarMedicosDepartamento($id)]);
    }

    public function mostrarEditarForm($id) {
        $d = new DepartamentoDAO();
        $dep = $d->mostrarDepartamento($id);
        return view("/departamento/editar", ['departamento' => $dep] );
    }
    
    public function editarDepartamento(Request $request) {
        $d = new DepartamentoDAO();
        $dep = $d->mostrarDepartamento($request->input('id'));
        $dep->id = $request->input('id');
        $dep->nombre = $request->input('nombre');
        $dep->imagen = $request->input('imagen');
        $dep->clinica_id = $request->input('clinica_id');
       
        if($d->actualizarDepartamento($dep)){
            return view("/departamento/editar", ['departamento' => $dep] );
        }else{
            return view('/error', ['error' => 'Error actualizando departamento.'] );
        }  
    }


    public function borrarDepartamento(Request $request) {

        $d = new DepartamentoDAO();
        return view('/departamento/departamento', ['departamento' => $d->mostrarDepartamento($id),'medicos' => $d->mostrarMedicosDepartamento($id)]);
    }

}
