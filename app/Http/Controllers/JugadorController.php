<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
        /**
     * @OA\Get(
     *     path="/api/jugadores",
     *     summary="Muestra a todos los jugadores(masculinos y femeninos)",
     *     @OA\Response(
     *         response=200,
     *         description="Devuelve a todos los tenistas y sus skills(masculinos y femeninos)",
     *     )
     * )
     */
    public function index()
    {
        $jugadores = Jugador::all();
        return response()->json($jugadores);
    }
}
