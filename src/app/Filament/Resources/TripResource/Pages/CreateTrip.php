<?php

namespace App\Filament\Resources\TripResource\Pages;

use App\Filament\Resources\TripResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTrip extends CreateRecord
{
    protected static string $resource = TripResource::class;

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
            ->title('Trip created successfully')
            ->success()
            ->send();
    }
}
