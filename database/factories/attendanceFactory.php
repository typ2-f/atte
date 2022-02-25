<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class attendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>\app\Models\User::factory(),
            'date_on'=> $this->faker->date ,
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->optional()->time()
        ];
    }
}
