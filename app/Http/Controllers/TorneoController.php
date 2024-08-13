<?php

namespace App\Http\Controllers;
use App\Models\Jugador;
use App\Services\TorneoService;

class TorneoController extends Controller
{
    public function simularTorneo()
    {
        $jugadores = Jugador::all();
        $torneoService = new TorneoService($jugadores);
        $ganador = $torneoService->simular();

        return response()->json(['ganador' => $ganador]);
    }
}