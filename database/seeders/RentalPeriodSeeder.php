<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RentalPeriod;

class RentalPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rentalPeriods = [
            ['months' => 3],
            ['months' => 6],
            ['months' => 12],
        ];

        foreach ($rentalPeriods as $period) {
            RentalPeriod::create($period);
        }
    }
}
