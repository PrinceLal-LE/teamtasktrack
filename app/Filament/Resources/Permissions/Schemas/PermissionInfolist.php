<?php

namespace App\Filament\Resources\Permissions\Schemas;

use Filament\Schemas\Schema;

class PermissionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Add infolist components here for Permission resource
                \Filament\Infolists\Components\TextEntry::make('name')
                    ->label('Permission Name'),

                \Filament\Infolists\Components\TextEntry::make('guard_name')
                    ->label('Guard Name'),
            ]);
    }
}
