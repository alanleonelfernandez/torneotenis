<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nivel_habilidad',
        'genero',
        'fuerza', 
        'velocidad', 
        'tiempo_reaccion'
    ];

    public function calcularProbabilidadVictoria()
    {
        return $this->nivel_habilidad + rand(0, 10);
    }
}
