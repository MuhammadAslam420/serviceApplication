<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(2,49),
            
            'booking_id' => $this->faker->numberBetween(1,100),
            'payment_mode' => $this->faker->randomElement(['credit_card', 'paypal', 'cash','jazzcash','easypaisa','bank']),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
        ];
    }
}
