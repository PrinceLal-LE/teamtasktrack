<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            // Select::make('user_id')
            //     ->label('Owner')
            //     ->relationship('owner', 'name')
            //     ->searchable()
            //     ->preload()
            //     ->required(),

            TextInput::make('name')
                ->required()
                ->maxLength(255),
           
            Select::make('personal_team')
                ->label('Personal Team')
                ->options([
                    1 => 'Yes',
                    0 => 'No',
                ])
                ->required()
                ->default(0),

        ]);
    }
}
