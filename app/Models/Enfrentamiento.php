<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfrentamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'jugador1_id',
        'jugador2_id',
        'ganador_id',
    ];

    public function jugador1()
    {
        return $this->belongsTo(Jugador::class, 'jugador1_id');
    }

    public function jugador2()
    {
        return $this->belongsTo(Jugador::class, 'jugador2_id');
    }

    public function ganador()
    {
        return $this->belongsTo(Jugador::class, 'ganador_id');
    }

    public function determinarGanador()
    {
        $probabilidadJugador1 = $this->jugador1->calcularProbabilidadVictoria();
        $probabilidadJugador2 = $this->jugador2->calcularProbabilidadVictoria();

        if ($probabilidadJugador1 > $probabilidadJugador2) {
            $this->ganador_id = $this->jugador1->id;
        } else {
            $this->ganador_id = $this->jugador2->id;
        }

        $this->save();
    }
}
