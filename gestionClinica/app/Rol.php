<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

    public function rol(){
        return $this->hasMany('App\User');
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
}
