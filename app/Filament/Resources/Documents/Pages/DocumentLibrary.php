<?php

namespace App\Filament\Pages;

use App\Models\Document;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Builder;

class DocumentLibrary extends Page
{
    /**
     * URL: /admin/documents
     */
    protected static ?string $slug = 'documents';

    /**
     * Blade view
     */
    protected string $view = 'filament.pages.document-library';

    /**
     * Sidebar navigation
     */
    protected static ?string $navigationLabel = 'Documents';
    // protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    // protected static ?string $navigationGroup = 'Management';

    /**
     * Search input
     */
    public string $search = '';

    /**
     * Data source for grid
     */
    public function getDocumentsProperty()
    {
        return Document::query()
            ->with('user')
            ->when(
                $this->search,
                fn (Builder $query) =>
                    $query->where('title', 'like', "%{$this->search}%")
                          ->orWhere('file_type', 'like', "%{$this->search}%")
            )
            ->latest()
            ->get();
    }

    /**
     * Navigation visibility
     */
    public static function shouldRegisterNavigation(): bool
    {
            // return auth()->check()
            //     && auth()->user()->can('view_any_document');

        return true;
    }

    /**
     * Header actions (top-right button)
     */
    protected function getHeaderActions(): array
    {
        return [
            Action::make('create')
                ->label('New Document')
                ->url(route('filament.admin.resources.documents.create'))
                ->button(),
        ];
    }
}
