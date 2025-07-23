<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TripResource\Pages;
use App\Filament\Resources\TripResource\RelationManagers;
use App\Models\Driver;
use App\Models\Supervisor;
use App\Models\Trip;
use App\Models\Vehicle;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class TripResource extends Resource
{
    protected static ?string $model = Trip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && Auth::user()->hasRole('supervisor');
    }

    public static function canViewAny(): bool
    {
        return Auth::check() && Auth::user()->hasAnyRole('driver', 'supervisor');
    }

    public static function canCreate(): bool
    {
        return Auth::check() && Auth::user()->hasRole('supervisor');
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::check() && Auth::user()->hasRole('supervisor');
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::check() && Auth::user()->hasRole('supervisor');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('driver_id')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('vehicle_id')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('destination')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('date')
                    ->required(),

                Forms\Components\TextInput::make('distance')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('cost')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),

                Tables\Columns\TextColumn::make('driver_id')
                    ->label('Driver ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('vehicle_id')
                    ->label('Vehicle ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('destination')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('distance')
                    ->sortable(),

                Tables\Columns\TextColumn::make('cost')
                    ->money('IDR', true)
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrips::route('/'),
            'create' => Pages\CreateTrip::route('/create'),
            'edit' => Pages\EditTrip::route('/{record}/edit'),
        ];
    }
}
