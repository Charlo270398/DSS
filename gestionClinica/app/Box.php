<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    private $numero;

    public function clinica(){
        return $this->belongsTo('App\Clinica');
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }
}
?>
