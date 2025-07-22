<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propiedad>
 */
class PropiedadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tipo' => $this->faker->randomElement(['casa','departamento','local comercial']),
            'direccion' => $this->faker->address,
            'precio'=> $this->faker->randomFloat(2,50000,100000),
            'descripcion'=> $this->faker->paragraph,
            'estado'=> $this->faker->randomElement(['disponible','alquilado','mantenimiento']),

        ];
    }
}
