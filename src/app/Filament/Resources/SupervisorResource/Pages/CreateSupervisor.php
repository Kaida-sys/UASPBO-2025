<?php

namespace App\Filament\Resources\SupervisorResource\Pages;

use App\Filament\Resources\SupervisorResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateSupervisor extends CreateRecord
{
    protected static string $resource = SupervisorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $slugName = Str::slug($data['name']);
        $timestamp = now()->timestamp;
        $email = "{$slugName}{$timestamp}@supervisor.com";

        $user = User::create([
            'name' => $data['name'],
            'email' => $email,
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('supervisor');

        $data['user_id'] = $user->id;

        return $data;
    }
}
