<?php

namespace Database\Seeders\cart;

use App\Models\cart\discountCode;
use Illuminate\Database\Seeder;

class DiscountCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        discountCode::factory()->count(5)->create(); // Creates 50 discount records

    }
}
