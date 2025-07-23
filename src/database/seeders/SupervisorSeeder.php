<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Supervisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supervisor::firstOrCreate([
            'username' => 'AJ',
            'name' => 'Alan Joe',
            'user_id' => 5,
            'phone' => '0987654321',
        ]);
    }
}