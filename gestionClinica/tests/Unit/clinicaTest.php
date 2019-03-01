<?php

namespace Tests\Unit;
use App\Clinica;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class clinicaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetterSetter()
    {
        $pepe = new Clinica();
        $pepe->setNombre("Profesor si neesitas un jamon aqui me tienes");
        $pepe->setDireccion("A donde quieras");
        $this->assertEquals($pepe->getNombre(),"Profesor si neesitas un jamon aqui me tienes");
        $this->assertEquals($pepe->getDireccion(),"A donde quieras");
    }
}
