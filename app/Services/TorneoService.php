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
        //40% definido por azar, 30% definido por nivel de habilidad
        $azarJugador1 = rand(0, 100) * 0.4;
        $azarJugador2 = rand(0, 100) * 0.4;
        $habilidadJugador1 = $jugador1->nivel_habilidad * 0.3;
        $habilidadJugador2 = $jugador2->nivel_habilidad * 0.3;
    
        // Masculino: 15% fuerza, 15% velocidad
        // Femenino: 10% fuerza, 10% velocidad, 10% reacción
        if ($jugador1->genero === 'Masculino') {
            $extraJugador1 = $jugador1->fuerza * 0.15 + $jugador1->velocidad * 0.15;
            $extraJugador2 = $jugador2->fuerza * 0.15 + $jugador2->velocidad * 0.15;
        } else {
            $extraJugador1 = $jugador1->fuerza * 0.1 + $jugador1->velocidad * 0.1 + $jugador1->tiempo_reaccion * 0.1;
            $extraJugador2 = $jugador2->fuerza * 0.1 + $jugador2->velocidad * 0.1 + $jugador2->tiempo_reaccion * 0.1;
        }
    
        $puntajeJugador1 = $azarJugador1 + $habilidadJugador1 + $extraJugador1;
        $puntajeJugador2 = $azarJugador2 + $habilidadJugador2 + $extraJugador2;
    
        return $puntajeJugador1 > $puntajeJugador2 ? $jugador1 : $jugador2;
    }
}

