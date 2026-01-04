<?php

namespace App\Filament\Resources\Teams\RelationManagers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('user_id')
                ->relationship('users', 'name')
                ->searchable()
                ->preload()
                ->required(),

            Select::make('role')
                ->options([
                    'Team Lead' => 'Team Lead',
                    'Staff' => 'Staff',
                    'Developer' => 'Developer',
                ])
                ->required(),
        ]);
    }
}
