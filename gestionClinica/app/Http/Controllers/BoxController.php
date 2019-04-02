<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BL\BoxDAO;
use App\Box;

class BoxController extends Controller
{
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
}
