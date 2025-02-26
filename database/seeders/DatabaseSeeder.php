<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            RegionSeeder::class,
            AttributeSeeder::class,
            AttributeValueSeeder::class,
            RentalPeriodSeeder::class,
            ProductSeeder::class,
            // Add other seeders here
        ]);
    }
}
