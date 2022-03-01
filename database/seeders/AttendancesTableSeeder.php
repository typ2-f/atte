<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;

class AttendancesTableSeeder extends Seeder
{
    public function run()
    {
        attendance::factory()->count(10)->create();
    }
}
