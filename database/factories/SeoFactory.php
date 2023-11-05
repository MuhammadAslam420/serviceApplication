<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seo>
 */
class SeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $serviceId = \App\Models\Service::pluck('id')->random();
        return [
            'service_id' =>$serviceId,
            'meta_keywords' => $this->faker->words(3, true),
            'meta_description' => $this->faker->text,
        ];
    }
}
