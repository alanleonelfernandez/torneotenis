<?php

namespace App\Services;

use App\Models\Jugador;
use App\Models\Enfrentamiento;
use App\Models\Torneo;

use Illuminate\Database\Eloquent\Collection;

class TorneoService
{
    protected $jugadores;

    public function __construct(Collection $jugadores)
    {
        $this->jugadores = $jugadores;
    }

    public function simularTorneo($genero)
    {
        $jugadores = Jugador::where('genero', $genero)->inRandomOrder()->get();

        if ($jugadores->count() < 2 || $jugadores->count() % 2 !== 0) {
            throw new \Exception('La cantidad de jugadores debe ser un número par y al menos 2.');
        }

        while ($jugadores->count() > 1) {
            $jugadores = $this->jugarRonda($jugadores);
        }

        $ganador = $jugadores->first();
        $torneo = new Torneo([
            'nombre' => "Torneo de " . strtolower($genero),
            'genero' => $genero,
            'ganador_id' => $ganador->id,
        ]);
        $torneo->save();

        return $ganador;
    }

    private function jugarRonda($jugadores)
    {
        $ganadores = collect();

        for ($i = 0; $i < $jugadores->count(); $i += 2) {
            $ganadores->push($this->jugarEnfrentamiento($jugadores[$i], $jugadores[$i + 1]));
        }

        return $ganadores;
    }

    private function jugarEnfrentamiento($jugador1, $jugador2)
    {
        $puntajeJugador1 = $jugador1->nivel_habilidad * 0.5 + rand(0, 100) * 0.5;
        $puntajeJugador2 = $jugador2->nivel_habilidad * 0.5 + rand(0, 100) * 0.5;
        
        return $puntajeJugador1 > $puntajeJugador2 ? $jugador1 : $jugador2;
    }
}

