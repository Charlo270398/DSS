<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BL\UserDAO;
use App\BL\BoxDAO;
use App\Box;
use App\Departamento;
use App\BL\DepartamentoDAO;
class BoxController extends Controller
{
    public function mostrarAddForm() {
        $u = new UserDAO();
        if (Auth::check()) {
            $ida = Auth::user()->id;
            if($u->mostrarRol($ida)->id==1){//ID PACIENTE = 2
                return view('/box/add', ['clinica' => 1] );

            }else{
                error_log("Intento de acceso a add box sin tener permisos", 0);
                return view('/user/menuusuario', ['citas'=>0 , 'tipo' => $u->mostrarRol($ida), 'error' =>'¡No puedes acceder  a esta parte porque no tienes permisos!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }

    }
    public function mostrarEditarForm($id) {
        $b = new BoxDAO();
        $box = $b->mostrarBox($id);
        return view('/box/editar', ['box' => $box] );
    }
    public function mostrarListaDepartamentos() {

                $d = new BoxDAO();
                return view('/box/lista', ['departamentos' => $d->mostrarListaBoxes(), 'op' => 'mostrar']); //La devuelve Alfabeticamente por defecto
    }
    public function mostrarListaBoxBorrar() {
        $u = new UserDAO();
        if (Auth::check()) {
            $ida = Auth::user()->id;
            if($u->mostrarRol($ida)->id==1){//ID Admin = 1
                $d = new BoxDAO();
                return view('/box/lista', ['error' => "", 'departamentos' => $d->mostrarListaBoxes(), 'op' => 'borrar']);

            }else{
                error_log("Intento de acceso a add box sin tener permisos", 0);
                return view('/user/menuusuario', ['citas'=>0 , 'tipo' => $u->mostrarRol($ida), 'error' =>'¡No puedes acceder  a esta parte porque no tienes permisos!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }

    }
    public function borrarBox($id) {

        if (Auth::check()) {
            $u = new UserDAO();
            $d = new boxDAO();
            $ida = Auth::user()->id;
            if($u->mostrarRol($ida)->id==1){//ID Admin = 1
                if($d->borrarBox($id)){
                    return redirect('/box/deleteList');
                }else{
                    return view('/box/lista', ['error' => 'No se han podido reasignar todas las citas de un día concreto a otro box, espera a que haya disponibilidad.','departamentos' => $d->mostrarListaBoxes(), 'op' => 'borrar']); 
                }
            }else{
                error_log("Intento de acceso a borrar box sin tener permisos", 0);
                return view('/user/menuusuario', ['citas'=>0 , 'tipo' => $u->mostrarRol($ida), 'error' =>'¡No puedes acceder  a esta parte porque no tienes permisos!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }


    public function mostrarCrearForm() {
        $b = new BoxDAO();
        $box = $b->mostrarBox($id);
        return view('/box/crear', ['box' => $box] );
    }
    public function addBox(Request $request) {
        $b = new BoxDAO();
        $box = new Box();
        $box->id = $request->input('id');
        $box->numero = $request->input('numero');
        $box->clinica_id = $request->input('clinica_id');

        if($b->addBox($box)){
            return view('/box/add', ['box' => $box] );
        }else{
            return view('/error', ['error' => 'Error añadiendo.'] );
        }
    }
}
