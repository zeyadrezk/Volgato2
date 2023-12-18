<?php

namespace Database\Factories\services;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\services\bookService>
 */
class bookServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>fake()->biasedNumberBetween(1,3),
            'service_id' => fake()->biasedNumberBetween(1,3),
            'date' => $this->faker->date(),
            'OrderNum' => $this->faker->unique()->numerify('ORD###'),
            'value' => $this->faker->numberBetween(100, 5000),
            'time' => $this->faker->Time(),
            'status' =>'waiting',

        ];
    }
}
