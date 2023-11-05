<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word,
            'name' => $this->faker->word,
            'api_url' => $this->faker->url,
            'merchant_id' => $this->faker->uuid,
            'hash' => $this->faker->sha256,
            'password' => $this->faker->password,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
