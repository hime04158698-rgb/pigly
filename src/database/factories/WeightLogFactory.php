<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'date' => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 40, 70),
            'calories' => $this->faker->numberBetween(1000, 3000),
            'exercise_time' => $this->faker->time('H:i'),
            'exercise_content' => $this->faker->optional()->sentence(),
        ];
    }
}
