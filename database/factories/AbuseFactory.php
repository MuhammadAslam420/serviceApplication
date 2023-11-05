<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Abuse>
 */
class AbuseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
                'user_id' => $this->faker->numberBetween(1,49),
                'provider_id' => $this->faker->numberBetween(50,101),
                'description' => $this->faker->paragraph,
                'complainant_type' => $this->faker->randomElement(['customer', 'provider', null]),
            ];
        
    }
}
