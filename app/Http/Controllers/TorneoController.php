<?php

namespace App\Http\Controllers;
use App\Models\Jugador;
use App\Services\TorneoService;
use App\Models\Torneo;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="API de Torneos de Tenis",
 *     version="1.0.0",
 *     description="Documentación de la API para la gestión de torneos de tenis."
 * )
 */
class TorneoController extends Controller
{
    protected $torneoService;

    public function __construct(TorneoService $torneoService)
    {
        $this->torneoService = $torneoService;
    }

    /**
     * @OA\Get(
     *     path="/api/simular-torneo-masculino",
     *     summary="Simular un torneo de tenis masculino",
     *     @OA\Response(
     *         response=200,
     *         description="Devuelve el resultado del torneo simulado",
     *     )
     * )
     */
    public function simularTorneoMasculino()
    {
        $ganador = $this->torneoService->simularTorneo('Masculino');
        return response()->json(['mensaje' => 'Torneo masculino simulado exitosamente', 'ganador' => $ganador]);
    }

    /**
     * @OA\Get(
     *     path="/api/simular-torneo-femenino",
     *     summary="Simular un torneo de tenis femenino",
     *     @OA\Response(
     *         response=200,
     *         description="Devuelve el resultado del torneo simulado",
     *     )
     * )
     */
    public function simularTorneoFemenino()
    {
        $ganador = $this->torneoService->simularTorneo('Femenino');
        return response()->json(['mensaje' => 'Torneo femenino simulado exitosamente', 'ganador' => $ganador]);
    }

    /**
     * @OA\Get(
     *     path="/api/historial-torneos",
     *     summary="Obtener historial de torneos masculinos y/o femeninos",
     *     @OA\Response(
     *         response=200,
     *         description="Devuelve el historial de torneos masculinos y/o femeninos",
     *     )
     * )
     */
    public function historial()
    {
        $torneos = Torneo::with('ganador')->get();

        return response()->json($torneos);
    }
}