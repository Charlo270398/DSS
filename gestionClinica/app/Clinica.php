<?php

namespace App;
use App\Box;
use App\Departamento;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    private $nombre;
    private $direccion;
    private $fecha_inauguracion;

    public function __construct($nombre, $direccion, $fecha_inauguracion){
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->fecha_inauguracion = $fecha_inauguracion;
    }

    public function box(){
        return $this->hasMany('Box');
    }

    public function departamentos(){
        return $this->hasMany('Departamento');
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

    public function getFecha_inauguracion(){
        return $this->fecha_inauguracion;
    }

    public function setFecha_inauguracion($fecha_inauguracion){
        $this->fecha_inauguracion = $fecha_inauguracion;
    }
}
?>
