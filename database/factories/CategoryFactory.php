<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'logo' => 'feature-icon-0'.$this->faker->numberBetween(1,9).'.svg',
            'overlay' => 'service-0'.$this->faker->numberBetween(1,9).'.jpg',
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
