<?php

namespace Database\Factories\services;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\services\ServiceRate>
 */
class ServiceRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'name'=>fake()->name,
	        'serviceEvaluation'=>['ar'=>fake()->name,'en'=>fake()->name],
	        'comment'=>fake()->name,
	        'rate'=>fake()->biasedNumberBetween(1,5),
	        'commentDate'=>fake()->date(),
	        'service_id'=>fake()->biasedNumberBetween(1,5),
	        'user_id'=>fake()->biasedNumberBetween(1,2),
	        
        ];
    }
}
