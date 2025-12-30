<?php

namespace App\Filament\Resources\Permissions\Schemas;

use Filament\Schemas\Schema;

class PermissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Add form components here for Permission resource
                \Filament\Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('guard_name')
                    ->required()
                    ->maxLength(255),   

            ]);
    }
}
