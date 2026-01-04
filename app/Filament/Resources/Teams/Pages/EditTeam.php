<?php

namespace App\Filament\Resources\Teams\Pages;

use App\Filament\Resources\Teams\TeamResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Container\Attributes\Auth;

class EditTeam extends EditRecord
{
    protected function authorizeAccess(): void
    {
        abort_unless(Auth::user()->can('view', $this->record), 403);
    }

    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
