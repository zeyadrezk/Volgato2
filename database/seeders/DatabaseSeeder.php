<?php

    namespace Database\Seeders;

    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use App\Models\services\ServiceTimes;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        private $faker;

        /**
         * Seed the application's database.
         */
        public function run(): void
        {
//            User::factory(5)->create();
            ServiceTimes::create([
                'service_time' =>fake()->time(),
                'status' => fake()->randomElement(['available', 'unavailable']),
                'service_id' => 1,
                'day_id' => 1,

            ]);

            // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
//	    category::create([
//		    'name' => fake()->name,
//		    'image'=>public_path('images/categories/2.jpg'),
//	    ]);
//	    category::create([
//		    'name' => fake()->name,
//		    'image'=>public_path('images/categories/1.jpg'),
//
//	    ]);

            $this->call([
//                CountrySeeder::class,
//                CategorySeeder::class,
//                ServiceSeeder::class,
//                ProductSeeder::class,
//                ProductRateSeeder::class,
//                ServiceRateSeeder::class,
//                CartSeeder::class,
//                CartItemSeeder::class,
//                ProductFeatureSeeder::class,
//                FavouriteProductSeeder::class,
//                OrderSeeder::class,
//                OrderItemsSeeder::class,
//                StaticPageSeeder::class,
//                DiscountCodeSeeder::class,
//                AddressSeeder::class,
//                BookServiceSeeder::class,
//                NotificationsSeeder::class,
//                ServiceTimesSeeder::class,
            ]);
        }
    }
