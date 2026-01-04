<?php

namespace App\Filament\Resources\Teams\Pages;

use App\Filament\Resources\Teams\TeamResource;
use App\Filament\Resources\Teams\RelationManagers\MembersRelationManager;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
class ViewTeam extends ViewRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        // return [
        //     EditAction::make(),
        // ];
        return array_filter([
            EditAction::make()
                ->visible(fn() => Auth::user()->can('view', $this->record)),
        ]);
    }
}
