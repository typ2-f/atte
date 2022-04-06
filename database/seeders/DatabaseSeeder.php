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
        User::factory()->count(100)
            ->has(Attendance::factory()->count(5)
                ->has(Rest::factory()
                )
            )->create();
    }
}
