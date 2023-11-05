<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
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
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'address' => $this->faker->streetAddress(),
            'tax' => $this->faker->randomFloat(2, 0, 100),
            'subtotal' => $this->faker->randomFloat(2, 0, 1000),
            'discount' => $this->faker->randomFloat(2, 0, 100),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'bookingstatus' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
