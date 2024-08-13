<?php

namespace App\Http\Controllers;
use App\Models\Jugador;
use App\Services\TorneoService;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    protected $torneoService;

    public function __construct(TorneoService $torneoService)
    {
        $this->torneoService = $torneoService;
    }

    public function simularTorneoMasculino()
    {
        $ganador = $this->torneoService->simularTorneo('Masculino');
        return response()->json(['mensaje' => 'Torneo masculino simulado exitosamente', 'ganador' => $ganador]);
    }

    public function simularTorneoFemenino()
    {
        $ganador = $this->torneoService->simularTorneo('Femenino');
        return response()->json(['mensaje' => 'Torneo femenino simulado exitosamente', 'ganador' => $ganador]);
    }

    public function historial()
    {
        $torneos = Torneo::with('ganador')->get();

        return response()->json($torneos);
    }
}