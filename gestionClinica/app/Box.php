<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clinica;

class Box extends Model
{
    private $numero;

    public function __construct($numero){
        $this->numero = $numero;
    }

    public function clinica(){
        return $this->belongsTo('Clinica');
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }
}
?>
