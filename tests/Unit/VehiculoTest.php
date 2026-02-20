<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class VehiculoTest extends TestCase
{
    /** @test */
    public function verifica_que_el_precio_diario_es_valido()
    {
        $precioDiario = 120000;
        $this->assertTrue($precioDiario > 0);
    }
}
