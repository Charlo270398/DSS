<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\DepartamentoDAO;
use App\BL\UserDAO;
use App\Departamento;

class DepartamentosController extends Controller
{
    public function mostrarListaDepartamentos() {

        $d = new DepartamentoDAO();
        return view('/departamento/lista', ['departamentos' => $d->mostrarListaDepartamentosAlfabetica(), 'op' => 'mostrar']); //La devuelve Alfabeticamente por defecto
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
    public function mostrarAddForm() {
        return view('/departamento/add', ['clinica' => 1] );
    }
    public function addDepartamento(Request $request) {
        $b = new DepartamentoDAO();
        $box = new Departamento();
        $box->id = $request->input('id');
        $box->nombre = $request->input('nombre');
        $box->imagen = $request->input('imagen');
        $box->clinica_id = $request->input('clinica_id');

        if($b->addDepartamento($box)){
            return view('/departamento/add', ['departamento' => $box] );
        }else{
            return view('/error', ['error' => 'Error añadiendo el departamento'] );
        }
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
            return redirect("/departamentos/editList");
        }else{
            return view('/error', ['error' => 'Error actualizando departamento.'] );
        }
    }
    public function borrarDepartamento($id) {
        $d = new DepartamentoDAO();
        if($d->borrarDepartamento($id)){
            return view('/departamento/lista', ['departamentos' => $d->mostrarListaDepartamentosAlfabetica(),'op' => 'borrar']);//TODO REDIRECCION
        }else{
            return view('/error', ['error' => 'Error borrando departamento.'] );
        }
    }

}
