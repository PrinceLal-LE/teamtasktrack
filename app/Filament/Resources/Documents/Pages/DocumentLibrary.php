<?php

namespace App\Filament\Pages;

use App\Models\Document;
use Filament\Pages\Page;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class DocumentLibrary extends Page
{
    protected static ?string $navigationLabel = 'Documents';
    // protected static string $view = 'filament.pages.document-library';
    protected string $view = 'filament.pages.document-library';


    public string $search = '';

    public function getDocumentsProperty()
    {
        return Document::query()
            ->with('user')
            ->when($this->search, fn (Builder $q) =>
                $q->where('title', 'like', "%{$this->search}%")
                   ->orWhere('file_type', 'like', "%{$this->search}%")
            )
            ->latest()
            ->get();
    }

    public static function shouldRegisterNavigation(): bool
    {
        // return Auth::user()?->can('view_any_document');
        return true;
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('create')
                ->label('New Document')
                ->url(route('filament.admin.resources.documents.create'))
                ->button(),
        ];
    }
}
