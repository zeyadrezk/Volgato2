<?php

namespace Database\Seeders;

use Database\Seeders\services\ServiceTimes;
use Illuminate\Database\Seeder;

class ServiceTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceTimes::factory()->count(5)->create();

    }
}
