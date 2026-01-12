<?php

namespace App\Filament\Resources\SupportTickets\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class SupportTicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('subject')
                    ->required(),

                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),

                // ✅ Hidden & auto-filled
                TextInput::make('user_id')
                    ->default(Auth::id())
                    ->hidden(),

                // ✅ Status ONLY on edit page
                Select::make('status')
                    ->options([
                        'open' => 'Open',
                        'in_progress' => 'In progress',
                        'resolved' => 'Resolved',
                    ])
                    ->required()
                    // ->visible(fn (Schema $schema) => $schema->getOperation() === 'edit'),
            ]);
    }
}
