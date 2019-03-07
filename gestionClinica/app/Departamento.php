<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clinica;

class Departamento extends Model
{
    private $nombre;

    public function clinica(){
        return $this->belongsTo('Clinica');
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
}
?>
