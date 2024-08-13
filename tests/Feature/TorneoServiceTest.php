<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Jugador;
use App\Services\TorneoService;

class TorneoServiceTest extends TestCase
{
    public function testSimularTorneo()
    {
        $jugadores = Jugador::factory()->count(4)->create();
        $torneoService = new TorneoService($jugadores);
        $ganador = $torneoService->simular();

        $this->assertInstanceOf(Jugador::class, $ganador);
        $this->assertTrue($jugadores->contains($ganador));
    }
}
