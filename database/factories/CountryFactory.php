<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country,
            'logo'=>'flag.jpg',
            'code' => $this->faker->unique()->countryCode,
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
        ];
    }
}
