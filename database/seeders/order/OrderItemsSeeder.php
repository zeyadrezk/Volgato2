<?php

namespace Database\Seeders\order;

use App\Models\order\OrderItems;
use Illuminate\Database\Seeder;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    OrderItems::factory()->count(5)->create();
	    
    }
}
