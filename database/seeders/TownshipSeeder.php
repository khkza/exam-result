<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Location;
use App\Models\Township;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Township::truncate();

        $datas = Location::select('region', 'township')->distinct()->get('region', 'township')->toArray();

        foreach ($datas as $data) {
            // dd($data);

            // dd(Region::where('name', $data['region'])->value('id'));
            Township::create([
                'name' => $data['township'],
                'region_id' => Region::where('name', $data['region'])->value('id'),
            ]);
        }  //
    }
}
