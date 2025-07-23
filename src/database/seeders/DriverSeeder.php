<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::firstOrCreate([
            'user_id' => 2,
            'driver_code' => '',
            'name' => 'John Doe',
            'license_number' => 'SIM123456',
            'phone' => '081234567890',
            'address' => 'Jl. Contoh No.1',
            'status' => 'active',
        ]);

        Driver::firstOrCreate([
            'user_id' => 3,
            'driver_code' => '',
            'name' => 'Jane Smith',
            'license_number' => 'SIM654321',
            'phone' => '082345678901',
            'address' => 'Jl. Contoh No.2',
            'status' => 'inactive',
        ]);
    }
}