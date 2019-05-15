<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BL\BoxDAO;
use App\Box;
use App\Departamento;
use App\BL\DepartamentoDAO;
class BoxController extends Controller
{
    public function mostrarAddForm() {
        return view('/box/add', ['clinica' => 1] );
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

        $d = new BoxDAO();
        return view('/box/lista', ['departamentos' => $d->mostrarListaBoxes(), 'op' => 'borrar']); //La devuelve Alfabeticamente por defecto
    }
    public function borrarBox($id) {
        $d = new boxDAO();
        if($d->borrarBox($id)){
            return redirect('/box/deleteList');
        }else{
            return view('/error', ['error' => 'Error borrando box.'] );
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
