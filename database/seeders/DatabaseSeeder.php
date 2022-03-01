<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)
            ->has(attendance::factory()->count(5)
                ->has(rest::factory()
                )
            )->create();
    }
}
