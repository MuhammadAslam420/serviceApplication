<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdditionalService>
 */
class AdditionalServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' =>$this->faker->numberBetween(1,100),
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
