<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'calories' => $this->faker->numberBetween(1800, 2500),
            'exercise_time' => $this->faker->numberBetween(0, 90),
            'exercise_content' => $this->faker->words(2, true),
        ];
    }
}
