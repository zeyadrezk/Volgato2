<?php

namespace Database\Factories\cart;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cart\discountCode>
 */
class DiscountCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'discount_code' => Str::upper(Str::random(10)),
            'percentage' => $this->faker->randomFloat(0, 0, 100), // Assuming 0-100 range for percentage
            'UseNumber' => $this->faker->numberBetween(1, 100),
            'maxValue' => $this->faker->numberBetween(100, 400),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),

        ];
    }
}
