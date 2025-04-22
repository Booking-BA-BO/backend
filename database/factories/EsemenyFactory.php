<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Esemeny>
 */
class EsemenyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'nev' => $this->faker->sentence(3),
            'leiras' => $this->faker->paragraph(),
            'hely' => $this->faker->city(),
            'kapacitas' => $this->faker->numberBetween(1, 1000),
            'ar' => $this->faker->numberBetween(0, 50000),
            'foglalastol' => $this->faker->numberBetween(2, 365),
            'foglalasig' => function (array $attributes) {
                return $this->faker->numberBetween(1, $attributes['foglalastol'] - 1);
            },
        ];
    }
}
