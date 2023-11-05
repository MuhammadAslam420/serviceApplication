<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'app_name' => $this->faker->word,
            'logo' => $this->faker->imageUrl(),
            'footer_logo' => $this->faker->imageUrl(),
            'favicon' => $this->faker->imageUrl(),
            'address' => $this->faker->address,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'tiktok' => $this->faker->url,
            'snapchat' => $this->faker->url,
            'whatsapp' => $this->faker->phoneNumber,
            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
        ];
    }
}
