<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BL\DepartamentoDAO;
use App\BL\UserDAO;
use App\Departamento;
use Illuminate\Support\Facades\Auth;

class DepartamentosController extends Controller
{
    public function mostrarListaDepartamentos() {

        $d = new DepartamentoDAO();
        return view('/departamento/lista', ['departamentos' => $d->mostrarListaDepartamentosAlfabetica(), 'op' => 'mostrar']); //La devuelve Alfabeticamente por defecto
    }

    public function mostrarListaDepartamentosEditar() {
        $u = new UserDAO();
        if (Auth::check()) {
            $ida = Auth::user()->id;
            if($u->mostrarRol($ida)->id==1){//ID PACIENTE = 2
                $d = new DepartamentoDAO();
                return view('/departamento/lista', ['departamentos' => $d->mostrarListaDepartamentos(), 'op' => 'editar']); //La devuelve Alfabeticamente por defecto

            }else{
                error_log("Intento de acceso a editar departamento sin tener permisos", 0);
                return view('/user/menuusuario', ['citas'=>0 , 'tipo' => $u->mostrarRol($ida), 'error' =>'¡No puedes acceder  a esta parte porque no tienes permisos!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }

    }

    public function mostrarListaDepartamentosBorrar() {
        $u = new UserDAO();
        if (Auth::check()) {
            $ida = Auth::user()->id;
            if($u->mostrarRol($ida)->id==1){//ID PACIENTE = 2
                $d = new DepartamentoDAO();
                return view('/departamento/lista', ['departamentos' => $d->mostrarListaDepartamentos(), 'op' => 'borrar']); //La devuelve Alfabeticamente por defecto

            }else{
                error_log("Intento de acceso a editar departamento sin tener permisos", 0);
                return view('/user/menuusuario', ['citas'=>0 , 'tipo' => $u->mostrarRol($ida), 'error' =>'¡No puedes acceder  a esta parte porque no tienes permisos!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }

    }


    public function mostrarDepartamento($id) {

        $d = new DepartamentoDAO();
        return view('/departamento/departamento', ['departamento' => $d->mostrarDepartamento($id),'medicos' => $d->mostrarMedicosDepartamento($id)]);
    }
    public function mostrarAddForm() {

        $u = new UserDAO();
        if (Auth::check()) {
            $id = Auth::user()->id;
            if($u->mostrarRol($id)->id==1){//ID PACIENTE = 2
                return view('/departamento/add', ['clinica' => 1] );

            }else{
                error_log("Intento de acceso a add departamento sin tener permisos", 0);
                return view('/user/menuusuario', ['citas'=>0 , 'tipo' => $u->mostrarRol($id), 'error' =>'¡No puedes acceder  a esta parte porque no tienes permisos!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }




    }
    public function addDepartamento(Request $request) {



        $u = new UserDAO();
        if (Auth::check()) {
            $id = Auth::user()->id;
            if($u->mostrarRol($id)->id==1){//ID PACIENTE = 2
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

            }else{
                error_log("Intento de acceso a un área sin tener permisos", 0);
                return view('/user/menuusuario', ['citas'=>0 , 'tipo' => $u->mostrarRol($id), 'error' =>'¡No puedes acceder  a esta parte porque no tienes permisos!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }

    }
    public function mostrarEditarForm($id) {

        $u = new UserDAO();
        if (Auth::check()) {
            $ida = Auth::user()->id;
            if($u->mostrarRol($ida)->id==1){//ID PACIENTE = 2
                $d = new DepartamentoDAO();
                $dep = $d->mostrarDepartamento($id);
                return view("/departamento/editar", ['departamento' => $dep] );

            }else{
                error_log("Intento de acceso a editar departamento sin tener permisos", 0);
                return view('/user/menuusuario', ['citas'=>0 , 'tipo' => $u->mostrarRol($ida), 'error' =>'¡No puedes acceder  a esta parte porque no tienes permisos!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }



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
