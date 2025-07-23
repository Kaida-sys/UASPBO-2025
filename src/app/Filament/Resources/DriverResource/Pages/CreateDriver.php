<?php

namespace App\Filament\Resources\DriverResource\Pages;

use App\Filament\Resources\DriverResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateDriver extends CreateRecord
{
    protected static string $resource = DriverResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $slugName = Str::slug($data['name']);
        $timestamp = now()->timestamp;
        $email = "{$slugName}@driver.com";
        $password = Hash::make('password');

        $user = User::create([
            'name' => $data['name'],
            'email' => $email,
            'password' => $password,
        ]);

        $user->assignRole('driver');

        $data['user_id'] = $user->id;

        return $data;
    }
}
