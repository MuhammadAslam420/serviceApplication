<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MobileAppDetail>
 */
class MobileAppDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->title(),
            'subtitle'=>$this->faker->sentence(),
            'image'=>'app-sec-five.png',
            'qr_code'=>'scan-img.png',
            'apple'=>$this->faker->url(),
            'google'=>$this->faker->url(),
            
        ];
    }
}
