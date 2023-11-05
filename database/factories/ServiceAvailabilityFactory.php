<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceAvailability>
 */
class ServiceAvailabilityFactory extends Factory
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
            'service_id' => $serviceId,
            'day' => $this->faker->dayOfWeek,
            'time_from' => $this->faker->time(),
            'time_to' => $this->faker->time(),
            'status' => $this->faker->randomElement(['active', 'inactive','offday']),
        ];
    }
}
