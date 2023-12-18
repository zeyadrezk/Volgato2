<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notifications>
 */
class NotificationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['Type1', 'Type2', 'Type3']),
            'notifiable_type' => $this->faker->randomElement(['Type1', 'Type2', 'Type3']),
            'notifiable_id'=>fake()->biasedNumberBetween(1,5),
            'data' => $this->faker->text,
        ];
    }
}
