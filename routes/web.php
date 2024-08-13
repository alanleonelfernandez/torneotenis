<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jugador;
use App\Services\TorneoService;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/simular-torneo', function () {
    $jugadores = Jugador::all();
    $torneo = new TorneoService($jugadores);
    $ganador = $torneo->simular();

    return response()->json([
        'ganador' => $ganador->nombre,
    ]);
});
