<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::firstOrCreate([
            'driver_id' => 1,
            'vehicle_id' => 1,
            'destination' => 'Bandung',
            'date' => '2025-07-14',
            'distance' => 150,
            'cost' => 500000,
        ]);

        Trip::firstOrCreate([
            'driver_id' => 2,
            'vehicle_id' => 2,
            'destination' => 'Jakarta',
            'date' => '2025-07-15',
            'distance' => 100,
            'cost' => 350000,
        ]);
    }
}