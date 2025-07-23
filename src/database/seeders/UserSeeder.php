<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password')]
        );
        $user->assignRole('super_admin');

        $driver1 = User::firstOrCreate(
            ['email' => 'driver1@admin.com'],
            ['name' => 'Driver 1', 'password' => Hash::make('password')]
        );
        $driver1->assignRole('driver');

        $driver2 = User::firstOrCreate(
            ['email' => 'driver2@admin.com'],
            ['name' => 'Driver 2', 'password' => Hash::make('password')]
        );
        $driver2->assignRole('driver');

        $supervisor = User::firstOrCreate(
            ['email' => 'supervisor@admin.com'],
            ['name' => 'Supervisor', 'password' => Hash::make('password')]
        );
        $supervisor->assignRole('supervisor');
    }
}