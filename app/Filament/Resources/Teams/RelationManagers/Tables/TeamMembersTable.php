<?php

namespace App\Filament\Resources\Teams\RelationManagers\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class TeamMembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('User')
                    ->searchable(),

                TextColumn::make('pivot.role')
                    ->label('Role')
                    ->badge(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                Action::make('add')
                    ->label('Add')
                    ->action(fn () => null),
            ]);
    }
}
