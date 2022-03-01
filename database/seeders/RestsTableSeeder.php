<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rest;

class RestsTableSeeder extends Seeder
{
    public function run()
    {
        rest::factory()->count(1)->create();
    }
}
