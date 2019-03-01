<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    private $nombre;
    private $direccion;
    private $fecha_inaguracion;

    public function box(){
        return $this->hasMany('App\Box');
    }

    public function departamentos(){
        return $this->hasMany('App\Departamento');
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getFecha_inaguracion(){
        return $this->fecha_inaguracion;
    }

    public function setFecha_inaguracion($fecha_inaguracion){
        $this->fecha_inaguracion = $fecha_inaguracion;
    }
}
?>
