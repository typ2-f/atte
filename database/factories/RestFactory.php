<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestFactory extends Factory
{
    public function definition()
    {
        return [
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->optional()->time()
        ];
    }
}
