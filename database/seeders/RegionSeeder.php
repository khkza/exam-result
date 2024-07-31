<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::truncate();

        $uniqueRegions = Location::distinct()->pluck('region');

        foreach ($uniqueRegions as $uniqueRegion) {
            Region::create([
                'name' => $uniqueRegion,
            ]);
        }
    }
}
