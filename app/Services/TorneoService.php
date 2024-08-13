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

    protected function jugarRonda(Collection $jugadores)
    {
        $ganadores = collect();

        for ($i = 0; $i < $jugadores->count(); $i += 2) {
            $enfrentamiento = new Enfrentamiento([
                'jugador1_id' => $jugadores[$i]->id,
                'jugador2_id' => $jugadores[$i + 1]->id,
            ]);
            $enfrentamiento->determinarGanador();
            $ganadores->push($enfrentamiento->ganador);
        }

        return $ganadores;
    }
}

