<?php

namespace Database\Factories\services;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\services\ServiceTimes>
 */
class ServiceTimesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_time' => $this->faker->time(),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'service_id' => 1,
            'day_id' => 1,

        ];
    }
}
