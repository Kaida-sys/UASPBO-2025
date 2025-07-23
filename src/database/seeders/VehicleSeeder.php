<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::firstOrCreate([
            'vehicle_code' => '',
            'plate_number' => 'B 1234 XYZ',
            'type' => 'Truck',
            'brand' => 'Isuzu',
            'status' => 'available',
        ]);

        Vehicle::firstOrCreate([
            'vehicle_code' => '',
            'plate_number' => 'D 5678 ABC',
            'type' => 'Bus',
            'brand' => 'Mercedes',
            'status' => 'maintenance',
        ]);
    }
}