<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'subtitle' => $this->faker->sentence,
            'image' =>'banner-0'.$this->faker->numberBetween(1,3).'.jpg', // Assuming images are stored in the storage/app/public/images directory
            'link' => $this->faker->url,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
