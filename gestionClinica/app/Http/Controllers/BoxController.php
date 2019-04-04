<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BL\BoxDAO;
use App\Box;

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
