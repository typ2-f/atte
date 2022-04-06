<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestFactory extends Factory
{
    public function definition()
    {
        return [
            'start_time' => $this->faker->dateTimeBetween($startDate = '09:00:00', $endDate = "14:59:59")->format('H:i:s'),
            'end_time' => $this->faker->dateTimeBetween($startDate = '15:00:00', $endDate = "20:59:59")->format('H:i:s'),
        ];
    }
}
