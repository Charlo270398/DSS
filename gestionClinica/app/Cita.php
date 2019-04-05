<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    private $fecha;

    public function medico(){
        return $this->belongsTo('App\User');
    }

    public function paciente(){
        return $this->belongsTo('App\User');
    }
}
