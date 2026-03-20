<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(1)->create()->each(function ($user) {
            WeightLog::factory()->count(35)->create([
                'user_id' => $user->id,
            ]);

            WeightTarget::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
