<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    private $fecha;

    private $descripcion;

    public function entrada(){
        return $this->belongsTo('App\User');
    }
}
