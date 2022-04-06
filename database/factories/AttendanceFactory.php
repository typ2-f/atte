<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    public function definition()
    {
        //1週間以内の日付で勤怠データを入れたい
        $now = now();
        $oldestDay = date('Y-m-d',strtotime('-1 week',strtotime($now)));
        return [
            'date_on' => $this->faker->unique()->dateTimeBetween($oldestDay,$now),
            'start_time' => $this->faker->dateTimeBetween('00:00:00', '08:59:59')->format('H:i:s'),
            'end_time' => $this->faker->dateTimeBetween('21:00:00', '23:59:59')->format('H:i:s')
        ];
    }
}
