<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clinica;

class Departamento extends Model
{
    private $nombre;
    private $id_clinica;

    public function clinica(){
        return $this->belongsTo('App\Clinica');
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
}
?>
