<?php

namespace Database\Factories;

use App\Models\Jugador;
use Illuminate\Database\Eloquent\Factories\Factory;

class JugadorFactory extends Factory
{
    protected $model = Jugador::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'nivel_habilidad' => $this->faker->numberBetween(0, 100),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'fuerza' => $this->faker->numberBetween(0, 100),
            'velocidad' => $this->faker->numberBetween(0, 100),
            'tiempo_reaccion' => $this->faker->numberBetween(0, 100),
        ];
    }
}
