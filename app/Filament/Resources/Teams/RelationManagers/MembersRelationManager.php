<?php

namespace App\Filament\Resources\Teams\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use BackedEnum;

use App\Filament\Resources\Teams\RelationManagers\Schemas\TeamMemberForm;
use App\Filament\Resources\Teams\RelationManagers\Tables\TeamMembersTable;

class MembersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $title = 'Members';

    protected static string|BackedEnum|null $icon = Heroicon::OutlinedUsers;

    public function form(Schema $schema): Schema
    {
        return TeamMemberForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return TeamMembersTable::configure($table);
    }
}
