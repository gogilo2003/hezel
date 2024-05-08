<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        printf("  Categories seeding started\n");
        foreach (["Commercial", "Residential", "Land", "Beach Plots"] as $category) {
            printf("  Category %s started\n", $category);
            \App\Models\Category::factory()->create([
                "slug" => \Illuminate\Support\Str::snake(str_replace('\\', ' ', $category)),
                "name" => $category,
            ]);
            printf("  Category %s done\n", $category);
        }
    }
}
