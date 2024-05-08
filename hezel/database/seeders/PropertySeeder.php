<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertySeeder extends Seeder
{
    function __construct()
    {
        $this->command = new Command();
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = require_once('data/property-01.php');

        $properties->each(function ($item) {
            $property = new \App\Models\Property();

            $property->slug = Str::slug(str_replace("/", " ", str_replace("\\", " ", $item->title)));
            $property->title = $item->title;
            $property->price = $item->price;
            $property->status = $item->status;
            $property->description = $item->description;
            $property->featured = $item->featured;
            $property->published = $item->published;
            $property->hot = $item->hot;
            $property->location = $item->location;

            $property->save();

            $property->categories()->sync($item->categories);

            foreach (range(1, $item->pictures) as $value) {
                $picture = new \App\Models\Picture();
                $inc = str_pad($property->id, 2, '0', STR_PAD_LEFT) . '-' . str_pad($value, 2, '0', STR_PAD_LEFT);
                $picture->url = "/images/properties/property-$inc.jpg";
                $picture->thumb = "/images/properties/thumbs/property-$inc.jpg";
                $property->pictures()->save($picture);
            }

            $this->command->info("  Property $property->title done");
        });
        // \App\Models\Property::factory(11)->create()->each(function ($property, $index) {


        //     \App\Models\Picture::factory()->create([
        //         "property_id" => $property->id,
        //         "url" => "/images/properties/property-" . str_pad($property->id, 2, '0', STR_PAD_LEFT) . '.jpg',
        //         "thumb" => "/images/properties/thumbs/property-" . str_pad($property->id, 2, '0', STR_PAD_LEFT) . '.jpg',
        //         "primary" => true,
        //     ]);


        //     $categories = \App\Models\Category::all()->pluck('id')->shuffle()->splice(rand(0, 4));
        //     $property->categories()->sync($categories);

        //     $this->command->info("  Property %d done\n\n", $index + 1);
        // });
    }
}
