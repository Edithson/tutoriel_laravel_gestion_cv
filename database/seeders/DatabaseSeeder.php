<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Technology::factory()->create([
            'nom' => 'Laravel',
        ]);
        Technology::factory()->create([
            'nom' => 'Spring Boot',
        ]);
        Technology::factory()->create([
            'nom' => 'Django',
        ]);
        Technology::factory()->create([
            'nom' => 'React JS',
        ]);
        Technology::factory()->create([
            'nom' => 'Next JS',
        ]);
    }
}
