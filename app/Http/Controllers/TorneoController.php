<?php

namespace App\Http\Controllers;
use App\Models\Jugador;
use App\Services\TorneoService;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    public function simularTorneo()
    {
        $jugadores = Jugador::all();
        $torneoService = new TorneoService($jugadores);
        $ganador = $torneoService->simular();

        $torneo = Torneo::create([
            'nombre' => 'Torneo ' . now()->format('Y-m-d H:i:s'),
            'genero' => 'Masculino',
            'ganador_id' => $ganador->id,
        ]);
    
        return response()->json(['ganador' => $ganador->nombre, 'torneo_id' => $torneo->id]);
    }

    public function historial()
    {
        $torneos = Torneo::with('ganador')->get();

        return response()->json($torneos);
    }
}