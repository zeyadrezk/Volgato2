<?php

namespace Database\Seeders\product;

use App\Models\product\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    Product::factory()->count(5)->create();
	    
    }
}
