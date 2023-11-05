<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
            'slug' => $this->faker->unique()->slug,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'description' => $this->faker->paragraph,
            'image'=>'service-0'.$this->faker->numberBetween(1,9).'.jpg',
            'city' => $this->faker->city,
            'service_type_id' => $this->faker->numberBetween(1,5),
            'country_id' => $this->faker->numberBetween(1,200),
            'category_id' =>$this->faker->numberBetween(1,10),
            'sub_category_id' =>$this->faker->numberBetween(1,10),
            'user_id' => $this->faker->numberBetween(50,100),
            'status' => 'active',
            'approved' => 'yes',
            'position' => $this->faker->numberBetween(1, 10),
            'featured'=>$this->faker->randomElement(['top', 'featured','vip']),
        ];
    }
}
