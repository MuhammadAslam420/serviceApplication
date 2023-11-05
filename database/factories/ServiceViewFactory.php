<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceView>
 */
class ServiceViewFactory extends Factory
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
            'user_id'=>$this->faker->numberBetween(2,49),
            'clicked' => $this->faker->boolean,
        ];
    }
}
