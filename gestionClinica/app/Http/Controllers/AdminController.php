<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function mostrarMenu($id) {
        return view('/user/menuadmin');
    }
}
