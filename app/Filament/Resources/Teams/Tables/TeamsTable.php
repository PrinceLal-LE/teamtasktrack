<?php

namespace App\Filament\Resources\Teams\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class TeamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('users_count')
                    ->counts('users')
                    ->label('Members'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
