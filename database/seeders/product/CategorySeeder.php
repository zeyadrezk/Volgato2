<?php

namespace Database\Seeders\product;

use App\Models\product\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    Category::factory()->count(5)->create();
    }
}
