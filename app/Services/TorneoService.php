<?php

namespace App\Services;

use App\Models\Jugador;
use App\Models\Enfrentamiento;

use Illuminate\Database\Eloquent\Collection;

class TorneoService
{
    protected $jugadores;

    public function __construct(Collection $jugadores)
    {
        $this->jugadores = $jugadores;
    }

    public function simular()
    {
        while ($this->jugadores->count() > 1) {
            $this->jugadores = $this->jugarRonda($this->jugadores);
        }

        return $this->jugadores->first();
    }

    protected function jugarRonda($jugadores)
    {
        $ganadores = collect();
    
        for ($i = 0; $i < $jugadores->count(); $i += 2) {
            // Verifica que existan dos jugadores para emparejar.
            if (isset($jugadores[$i + 1])) {
                $enfrentamiento = new Enfrentamiento($jugadores[$i], $jugadores[$i + 1]);
                $enfrentamiento->determinarGanador();
                $ganadores->push($enfrentamiento->ganador);
            } else {
                // Si hay un jugador sin pareja, avanza automáticamente a la siguiente ronda.
                $ganadores->push($jugadores[$i]);
            }
        }
    
        return $ganadores;
    }
}

