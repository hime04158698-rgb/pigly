<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightTargetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'target_weight' => $this->faker->randomFloat(1, 40, 70),
        ];
    }
}
