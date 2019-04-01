<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function usuario(){
        return $this->belongsTo('App\Rol');
    }
}
