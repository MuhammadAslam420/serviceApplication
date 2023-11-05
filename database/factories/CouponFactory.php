<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userTypes = ['ADM', 'VEN'];

        return [
            'user_id' => $this->faker->numberBetween(50,101),
            'utype' => 'VEN',
            'code' => $this->faker->unique()->word,
            'discount_amount' => $this->faker->randomFloat(2, 5, 50),
            'is_active' => true,
        ];
    }
}
