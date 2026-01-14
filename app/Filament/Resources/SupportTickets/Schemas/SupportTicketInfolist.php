<?php

namespace App\Filament\Resources\SupportTickets\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SupportTicketInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ✅ User name instead of ID
                TextEntry::make('user.name')
                    ->label('User')
                    ->placeholder('-'),

                TextEntry::make('subject')
                    ->label('Subject'),

                // ✅ Short message (max 120 chars)
                TextEntry::make('message')
                    ->label('Message')
                    ->formatStateUsing(fn (?string $state) =>
                        $state ? Str::limit($state, 120) : '-'
                    )
                    ->columnSpanFull(),

                TextEntry::make('status')
                    ->badge(),

                TextEntry::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
