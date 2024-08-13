<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\JugadorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/simular-torneo-masculino', [TorneoController::class, 'simularTorneoMasculino']);

Route::get('/simular-torneo-femenino', [TorneoController::class, 'simularTorneoFemenino']);

Route::get('/jugadores', [JugadorController::class, 'index']);

Route::get('/historial-torneos', [TorneoController::class, 'historial']);