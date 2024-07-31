<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\QuarterSeeder;
use Database\Seeders\TownshipSeeder;
use Database\Seeders\LocationsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
          AdminSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            LocationsSeeder::class,
            RegionSeeder::class,
            TownshipSeeder::class,
            ResultSeeder::class,
            StudentSeeder::class,


            ]
        );

    }
}
