<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Define table columns for User resource here
                \Filament\Tables\Columns\TextColumn::make('name'),
                \Filament\Tables\Columns\TextColumn::make('email')->label('Email Address')->sortable()->searchable(),
                \Filament\Tables\Columns\TextColumn::make('currentTeam.name')->label('Team'),
                \Filament\Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime('d M Y'),    
            ])
            ->filters([
                // You can add filters later if needed
                \Filament\Tables\Filters\SelectFilter::make('team')
                    ->relationship('currentTeam', 'name'),  
                // \Filament\Tables\Filters\TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
