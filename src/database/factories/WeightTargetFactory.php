<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightTargetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),  // ユーザーを関連付ける
            'target_weight' => 65.0,  // ダミーの目標体重
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
