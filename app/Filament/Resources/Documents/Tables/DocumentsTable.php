<?php

namespace App\Filament\Resources\Documents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 📄 Title (Google Docs style)
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                // 👤 Owner
                TextColumn::make('user.name')
                    ->label('Owner')
                    ->searchable()
                    ->sortable(),

                // 🧾 File extension
                TextColumn::make('file_type')
                    ->label('Type')
                    ->badge()
                    ->sortable(),

                // 📦 Size
                TextColumn::make('file_size')
                    ->label('Size')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => number_format($state / 1024 / 1024, 2) . ' MB'),

                // 🕒 Date
                TextColumn::make('created_at')
                    ->label('Uploaded')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                // 🔍 Filter by file type
                SelectFilter::make('file_type')
                    ->label('File Type')
                    ->options(fn () =>
                        \App\Models\Document::query()
                            ->distinct()
                            ->pluck('file_type', 'file_type')
                            ->toArray()
                    ),
            ])
            ->defaultSort('created_at', 'desc') // 📌 Google Docs style
            ->recordActions([
                ViewAction::make(),

                // Tables\Actions\Action::make('download')
                //     ->icon('heroicon-o-arrow-down-tray')
                //     ->url(fn ($record) => asset('storage/' . $record->file_path))
                //     ->openUrlInNewTab(),

                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
