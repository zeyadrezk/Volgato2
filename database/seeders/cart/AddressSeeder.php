<?php

namespace Database\Seeders\cart;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::factory()
            ->count(5) // Number of addresses to create
            ->create();
    }
}
