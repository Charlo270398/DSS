<?php

namespace Tests\Unit;
use App\Box;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class boxTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetterSetter()
    {
        $pepe = new Box();
        $pepe->setNumero(8);
        $this->assertEquals($pepe->getNumero(),8);

    }
}
