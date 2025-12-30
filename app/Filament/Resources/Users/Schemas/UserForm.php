<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('name')
                ->required()
                ->maxLength(255),

            TextInput::make('password')
                ->password()
                ->required(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                ->dehydrated(fn ($state) => filled($state)),

            TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),

            Select::make('current_team_id')
                ->label('Team')
                ->relationship('currentTeam', 'name')
                ->searchable()
                ->preload(),

            Select::make('roles')
                ->label('Roles')
                ->relationship('roles', 'name')
                ->multiple()
                ->preload()
                ->required(),

        ]);
    }
}
