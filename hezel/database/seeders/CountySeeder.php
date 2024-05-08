<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counties = collect(require_once(__DIR__ . '/data/counties.php'))->sortBy('code');

        foreach ($counties as $index => $county) {
            printf("  %d Started seeding %s County [%s]\n", $index + 1, $county['name'], $county['code']);

            $item = \App\Models\County::factory()->create([
                "code" => $county["code"],
                "capital" => $county["capital"] ?? null,
                "name" => $county["name"],
            ]);

            printf("    Seeding sub counties in %s county\n", $item->name);
            foreach ($county["sub_counties"] as $sub_county) {
                \App\Models\SubCounty::factory()->create([
                    "county_id" => $item->id,
                    "name" => $sub_county,
                ]);
                printf("      Done %s\n", $sub_county);
            }
            printf("    Done seeding sub counties in %s County\n\n", $item->name);

            if (isset($county['capital'])) {
                $town = \App\Models\Town::factory()->create([
                    "county_id" => $item->id,
                    "name" => $item->capital,
                ]);
                printf("    %s town seeded\n\n", $town->name);
            }

            printf("  County (%s) %s done\n\n", $county['code'], $county['name']);
        }
    }
}
