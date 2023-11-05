<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingItem>
 */
class BookingItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' =>$this->faker->numberBetween(1,100),
            'provider_id' => $this->faker->numberBetween(50,100),
            'service_id' =>$this->faker->numberBetween(1,100),
            'price' => $this->faker->randomFloat(2, 0, 500),
            'qty' => $this->faker->randomNumber(2),
        ];
    }
}
