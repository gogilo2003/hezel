<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $slides = collect([
            [
                "url" => "/images/slides/slide-land.jpg",
                "title" => "Land",
                "caption" => "",
                "link" => route('properties', 'land'),
            ],
            [
                "url" => "/images/slides/slide-commercial.jpg",
                "title" => "Commercial Properties",
                "caption" => "",
                "link" => route('properties', 'commercial'),
            ],
            [
                "url" => "/images/slides/slide-residential.jpg",
                "title" => "Residential Properties",
                "caption" => "",
                "link" => route('properties', 'residential'),
            ],
            [
                "url" => "/images/slides/slide-beach_plot.jpg",
                "title" => "Beach Plots",
                "caption" => "",
                "link" => route('properties', 'beach_plots'),
            ],
        ]);

        printf("  Seeding slides\n");
        $slides->each(function ($slide) {
            \App\Models\Slide::factory()->create($slide);
        });
    }
}
