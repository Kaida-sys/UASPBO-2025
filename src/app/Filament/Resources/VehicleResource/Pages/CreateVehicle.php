<?php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateVehicle extends CreateRecord
{
    protected static string $resource = VehicleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['driver_id'] = Auth::user()?->driver?->id;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Vehicle created successfully')
            ->success()
            ->send();
    }
}
