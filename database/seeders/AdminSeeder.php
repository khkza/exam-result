<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email'    => 'admin@gmail.com',
            'role_id' => '10',
            'password' => bcrypt('password'),
            'phone'=>'0999887878',

        ]);

    }
}
