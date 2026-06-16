<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call custom seeders
        $this->call([
            HotelSeeder::class,
            DriverSeeder::class,
        ]);

        // Seed a default test user
        User::factory()->create([
            'name' => 'أسامة العدني',
            'email' => 'osama@example.com',
            'password' => bcrypt('password123'),
            'phone' => '+967 777 777 777',
            'avatar' => null,
        ]);
    }
}
