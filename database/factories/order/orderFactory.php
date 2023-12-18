<?php

	namespace Database\Factories\order;

	use Illuminate\Database\Eloquent\Factories\Factory;

	/**
	 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order\order>
	 */
	class OrderFactory extends Factory
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
                'name' => $this->faker->name,
                'address' => $this->faker->address,
                'DateOfOrder' => $this->faker->date(),
                'OrderNumber' => $this->faker->unique()->numerify('Order###'),
                'total' => $this->faker->randomFloat(2, 20, 500),
                'discountValue' => $this->faker->optional()->randomFloat(2, 0, 100),
                'totalAfterDisc' => $this->faker->randomFloat(2, 20, 500), // You might want to calculate this based on total and discountValue
                'PaymentReference' => $this->faker->optional()->swiftBicNumber,
                'status' => $this->faker->randomElement(['waiting', 'current', 'previous']),

			];
		}
	}
