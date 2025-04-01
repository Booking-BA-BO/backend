<?php

namespace Database\Factories;

use App\Models\Rendez;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foglalas>
 */
class FoglalasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rendezveny_id' => Rendez::all()->random()->rendezveny_id,
            'teljes_nev' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefon' => $this->faker->unique()->randomNumber(9, true),
            'db' => $this->faker->numberBetween(1, 10),
        ];
    }
}
