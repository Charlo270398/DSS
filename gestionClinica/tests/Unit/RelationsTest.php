<?php

namespace Tests\Unit;

use App\Box;
use App\Clinica;
use App\Departamento;
use Tests\TestCase;
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
        
    }
}
