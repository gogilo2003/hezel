<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $icons = ['dashboard', 'product', 'logout', 'add', 'edit', 'times', 'chart', 'location'];
        $value = [fake()->realText(10), fake()->randomNumber()];
        return [
            "name" => Str::snake(fake()->realText(10)),
            "value" => $value[rand(0, 1)],
            "highlighted" => rand(0, 1),
            "icon" => $icons[rand(0, 7)]
        ];
    }
}
