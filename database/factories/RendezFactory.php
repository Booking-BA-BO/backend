<?php

namespace Database\Factories;

use App\Models\Esemeny;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rendez>
 */
class RendezFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'esemeny_id' => Esemeny::all()->random()->esemeny_id,
            'datum' => $this->faker->dateTimeBetween('+1 days', '+2 years')->format('Y-m-d H:i:s'),
            'nyitva' => false,
        ];
    }
}
