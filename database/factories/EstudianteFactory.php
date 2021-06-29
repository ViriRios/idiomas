<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'codigo' => $this->faker->randomNumber(9, true),
            'correo' => $this->faker->unique()->safeEmail(),
            'escolaridad_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
