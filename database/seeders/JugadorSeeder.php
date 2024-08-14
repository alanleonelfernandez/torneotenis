<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jugador;

class JugadorSeeder extends Seeder
{
    public function run()
    {
        $jugadores = [
            [
                'nombre' => 'Roger Federer',
                'nivel_habilidad' => 95,
                'genero' => 'Masculino',
                'fuerza' => 96,
                'velocidad' => 77,
                'tiempo_reaccion' => 90
            ],
            [
                'nombre' => 'Rafael Nadal',
                'nivel_habilidad' => 92,
                'genero' => 'Masculino',
                'fuerza' => 91,
                'velocidad' => 75,
                'tiempo_reaccion' => 86
            ],
            [
                'nombre' => 'Victoria Carter',
                'nivel_habilidad' => 86,
                'genero' => 'Femenino',
                'fuerza' => 77,
                'velocidad' => 81,
                'tiempo_reaccion' => 83
            ],
            [
                'nombre' => 'Elliot Bailey',
                'nivel_habilidad' => 89,
                'genero' => 'Femenino',
                'fuerza' => 71,
                'velocidad' => 82,
                'tiempo_reaccion' => 91
            ],
            [
                'nombre' => 'Noemi Schmidt I',
                'nivel_habilidad' => 86,
                'genero' => 'Masculino',
                'fuerza' => 67,
                'velocidad' => 74,
                'tiempo_reaccion' => 91
            ],
            [
                'nombre' => 'Leola Rolfson',
                'nivel_habilidad' => 83,
                'genero' => 'Masculino',
                'fuerza' => 86,
                'velocidad' => 71,
                'tiempo_reaccion' => 79
            ],
            [
                'nombre' => 'Novak Djokovic',
                'nivel_habilidad' => 98,
                'genero' => 'Masculino',
                'fuerza' => 97,
                'velocidad' => 88,
                'tiempo_reaccion' => 79
            ],
            [
                'nombre' => 'Andy Murray',
                'nivel_habilidad' => 88,
                'genero' => 'Masculino',
                'fuerza' => 80,
                'velocidad' => 78,
                'tiempo_reaccion' => 66
            ],
            [
                'nombre' => 'Stan Wawrinka',
                'nivel_habilidad' => 85,
                'genero' => 'Masculino',
                'fuerza' => 87,
                'velocidad' => 82,
                'tiempo_reaccion' => 70
            ],
            [
                'nombre' => 'Juan Martin del Potro',
                'nivel_habilidad' => 82,
                'genero' => 'Masculino',
                'fuerza' => 92,
                'velocidad' => 75,
                'tiempo_reaccion' => 69
            ],
            [
                'nombre' => 'Serena Williams',
                'nivel_habilidad' => 99,
                'genero' => 'Femenino',
                'fuerza' => 87,
                'velocidad' => 77,
                'tiempo_reaccion' => 95
            ],
            [
                'nombre' => 'Simona Halep',
                'nivel_habilidad' => 93,
                'genero' => 'Femenino',
                'fuerza' => 75,
                'velocidad' => 75,
                'tiempo_reaccion' => 88
            ],
            [
                'nombre' => 'Angelique Kerber',
                'nivel_habilidad' => 90,
                'genero' => 'Femenino',
                'fuerza' => 46,
                'velocidad' => 84,
                'tiempo_reaccion' => 90
            ],
            [
                'nombre' => 'Flavia Pennetta',
                'nivel_habilidad' => 89,
                'genero' => 'Femenino',
                'fuerza' => 44,
                'velocidad' => 79,
                'tiempo_reaccion' => 86
            ],
            [
                'nombre' => 'Caroline Wozniacki',
                'nivel_habilidad' => 87,
                'genero' => 'Femenino',
                'fuerza' => 59,
                'velocidad' => 80,
                'tiempo_reaccion' => 85
            ],
            [
                'nombre' => 'Gabriela Sabatini',
                'nivel_habilidad' => 82,
                'genero' => 'Femenino',
                'fuerza' => 68,
                'velocidad' => 77,
                'tiempo_reaccion' => 88
            ],
        ];

        foreach ($jugadores as $jugador) {
            Jugador::create($jugador);
        }
    }
}
