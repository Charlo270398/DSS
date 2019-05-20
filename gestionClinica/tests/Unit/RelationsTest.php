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

        $cita->fecha = date('Y-m-d');
        $cita->medico_id = $medico->id;
        $cita->paciente_id = $paciente->id;
        $cita->box_id = $box->id;
        $cita->motivo = 'porque si';
        $cita->save();
        $entrada->medico_id = $medico->id;
        $entrada->paciente_id = $paciente->id;
        $entrada->fecha = date('Y-m-d');
        $entrada->descripcion = 'hola';
        $entrada->save();
        $rol->user()->save($medico);

        $this->assertEquals($medico->medico_cita[0]->fecha, date('Y-m-d'));
        $this->assertEquals($paciente->paciente_cita[0]->fecha, date('Y-m-d'));
        $this->assertEquals($medico->entradaM[0]->fecha, date('Y-m-d'));
        $this->assertEquals($paciente->entradaP[0]->fecha, date('Y-m-d'));
        $this->assertEquals($rol->user[0]->nombre, 'Pepe');
        $cita->delete();
        $medico->delete();
        $paciente->delete();
        $entrada->delete();
        $rol->delete();
        $departamento->delete();
        $clinica->delete();
        $box->delete();
    }
}
