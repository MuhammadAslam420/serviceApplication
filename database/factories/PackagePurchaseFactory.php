<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackagePurchase>
 */
class PackagePurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(2, 49),
            'package_id' => $this->faker->numberBetween(1, 3),
            'purchase_date' => $this->faker->date,
        ];
    }
}
