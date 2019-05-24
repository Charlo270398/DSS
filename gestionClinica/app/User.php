<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function rol(){
        return $this->belongsTo('App\Rol');
    }

    public function entradaM(){
        return $this->hasMany('App\Entrada', 'medico_id');
    }

    public function entradaP(){
        return $this->hasMany('App\Entrada', 'paciente_id');
    }

    public function medico_cita(){
        return $this->hasMany('App\Cita', 'medico_id');
    }

    public function paciente_cita(){
        return $this->hasMany('App\Cita', 'paciente_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidos', 'fecha_nacimiento', 'email', 'password', 'dni', 'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
