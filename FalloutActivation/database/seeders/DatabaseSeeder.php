<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ryan',
            'email' => 'ryan@gmail.com',
            'password' => Hash::make('ryan123'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Raditya',
            'email' => 'raditya@gmail.com',
            'password' => Hash::make('raditya123'),
            'role' => 'helpdesk',
        ]);

        $this->call(LaporanSeeder::class);
    }
}