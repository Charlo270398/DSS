<?php

namespace Tests\Unit;
use App\Departamento;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class departamentoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetterSetter()
    {
        $pepe = new Departamento();
        $pepe->setNombre("Soc Joan");
        $this->assertEquals($pepe->getNombre(),"Soc Joan");

    }
}
