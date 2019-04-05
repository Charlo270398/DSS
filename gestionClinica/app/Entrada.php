<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    public function entrada(){
        return $this->belongsTo('App\User');
    }
}
