<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->realText(25);
        return [
            "slug" => Str::slug($title),
            "title" => $title,
            "description" => fake()->realText(),
            "price" => fake()->numberBetween(10000, 10000000),
            "category_id" => fake()->numberBetween(1, 3),
            "county_id" => fake()->numberBetween(1, 47),
            "town_id" => fake()->numberBetween(1, 47),
            "location" => fake()->streetAddress(),
            "featured" => rand(0, 1),
            "published" => rand(0, 1),
        ];
    }
}
