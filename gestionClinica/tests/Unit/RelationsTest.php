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
        $box->clinica_id = $clinica->id;
        $box->save();

        $this->assertEquals($clinica->departamentos[0]->nombre, 'uno');
        $this->assertEquals($clinica->departamentos[0]->imagen, 'dos');
        $this->assertEquals($clinica->box[0]->numero, '10000');

        $medico = new User();
        $paciente = new User();
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
        $paciente->dni = '4321';
        $paciente->nombre = 'Paco';
        $paciente->apellidos = 'Lopez';
        $paciente->email = 'paco@email.xd';
        $paciente->password = '12345';
        $paciente->rol_id = '2';
        $paciente->save();

        $cita->fecha = 'ayer';
        $cita->medico_id = $medico->id;
        $cita->paciente_id = $paciente->id;
        $cita->box_id = $box->id;
        $cita->motivo = 'porque si';
        $cita->save();
        $entrada->fecha = 'hoy';
        $entrada->texto = 'hola';
        $medico->entrada()->save($entrada);
        $rol->user()->save($medico);

        /*$this->assertEquals($medico->cita[0]->fecha, 'ayer');*/
        $this->assertEquals($medico->entrada[0]->fecha, 'hoy');
        $this->assertEquals($rol->user[0]->nombre, 'Pepe');
        $cita->delete();
        $medico->delete();
        $entrada->delete();
        $rol->delete();
        $departamento->delete();
        $clinica->delete();
    }
}
