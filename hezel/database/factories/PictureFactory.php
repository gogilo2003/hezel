<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Picture>
 */
class PictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "url" => "https://picsum.photos/540/640",
            "thumb" => "https://picsum.photos/256",
            "caption" => fake()->realText(50),
            "property_id" => fake()->numberBetween(1, 10),
        ];
    }
}
