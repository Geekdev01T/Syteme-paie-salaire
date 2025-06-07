<?php

namespace Database\Factories;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'first_name' => $this->faker->firstName(),
            'email' => $this->faker->email(),
            'contact' => $this->faker->phoneNumber(),
            'status' => $this->faker->randomElement(['intermittent', 'permanent']),
            'honorary' => $this->faker->numberBetween(500, 10000),
        ];
    }
}
