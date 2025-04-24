<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightTargetFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'target_weight' => 65.0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
