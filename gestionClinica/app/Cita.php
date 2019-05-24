<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    private $fecha;

    public function medico(){
        return $this->belongsTo('App\User', 'medico_id');
    }

    public function paciente(){
        return $this->belongsTo('App\User', 'paciente_id');
    }
}
