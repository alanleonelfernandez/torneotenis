<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfrentamiento
{
    public $jugador1;
    public $jugador2;
    public $ganador;

    public function __construct($jugador1, $jugador2)
    {
        $this->jugador1 = $jugador1;
        $this->jugador2 = $jugador2;
    }

    public function determinarGanador()
    {
        // Calcula la "fuerza" total de cada jugador
        $habilidad1 = $this->jugador1->nivel_habilidad + rand(0, 10);
        $habilidad2 = $this->jugador2->nivel_habilidad + rand(0, 10);

        if ($this->jugador1->genero == 'Masculino') {
            $habilidad1 += $this->jugador1->fuerza + $this->jugador1->velocidad;
        } else {
            $habilidad1 += $this->jugador1->tiempo_reaccion;
        }

        if ($this->jugador2->genero == 'Masculino') {
            $habilidad2 += $this->jugador2->fuerza + $this->jugador2->velocidad;
        } else {
            $habilidad2 += $this->jugador2->tiempo_reaccion;
        }

        // Determina el ganador
        $this->ganador = $habilidad1 > $habilidad2 ? $this->jugador1 : $this->jugador2;
    }
}
