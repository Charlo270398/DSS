<?php

namespace Tests\Unit;

use App\Box;
use App\Clinica;
use App\Departamento;
use Tests\TestCase;
use App\User;
use App\Rol;
use App\Cita;
use App\Entrada;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RelationsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $clinica =new Clinica();
        $box = new Box();

        $clinica->nombre = 'Pepe';
        $clinica->direccion = '1';
        $clinica->fecha_inauguracion = '1';
        $box->numero='10000';
        $clinica->save();

        $departamento = new Departamento();
        $departamento->nombre = 'uno';
        $departamento->imagen = 'dos';
        $clinica->departamentos()->save($departamento);
        $clinica->box()->save($box);

        $this->assertEquals($clinica->departamentos[0]->nombre, 'uno');
        $this->assertEquals($clinica->departamentos[0]->imagen, 'dos');
        $this->assertEquals($clinica->box[0]->numero, '10000');
        $departamento->delete();
        $box->delete();
        $clinica->delete();

        $medico = new User();
        $entrada = new Entrada();
        $cita = new Cita();
        $rol = new Rol();

        $rol->nombre = 'medico';
        $rol->save();
        $medico->dni = '1234';
        $medico->nombre = 'Pepe';
        $medico->apellidos = 'Pacheco García';
        $medico->email = 'pepe@email.xd';
        $medico->password = '1234';
        $medico->rol_id = '1';
        $medico->save();

        $cita->fecha = 'ayer';
        $entrada->fecha = 'hoy';
        $entrada->texto = 'hola';
       /* $medico->cita()->save($cita);*/
        $medico->entrada()->save($entrada);
        $rol->user()->save($medico);

        /*$this->assertEquals($medico->cita[0]->fecha, 'ayer');*/
        $this->assertEquals($medico->entrada[0]->fecha, 'hoy');
        $this->assertEquals($rol->user[0]->nombre, 'Pepe');
        $cita->delete();
        $medico->delete();
        $entrada->delete();
        $rol->delete();
    }
}
