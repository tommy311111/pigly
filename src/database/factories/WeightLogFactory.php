<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    public function definition()
    {
        return [
            'calories' => $this->faker->numberBetween(1800, 2500),
            'exercise_time' => sprintf('%02d:%02d', rand(0, 2), rand(0, 59)),
            'exercise_content' => $this->faker->randomElement([
                'Jogging in the park',
                'Yoga for 30 minutes',
                'Strength training at the gym',
                'Cycling around the city',
                'Swimming at the pool',
                'Home workout session',
                'Pilates class',
                'Walking the dog',
            ]),
        ];
    }
}
