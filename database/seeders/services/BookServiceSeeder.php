<?php

namespace Database\Seeders\services;

use App\Models\services\bookService;
use Illuminate\Database\Seeder;

class BookServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookService::factory()->count(50)->create();

    }
}
