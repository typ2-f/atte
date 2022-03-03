<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    public function definition()
    {
        return [
            'date_on'=> $this->faker->date ,
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->optional()->time()
        ];
    }
}
