<?php

namespace App\Filament\Resources\Documents\Pages;

use App\Filament\Resources\DocumentResource;
use App\Filament\Resources\Documents\DocumentResource as DocumentsDocumentResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateDocument extends CreateRecord
{
    protected static string $resource = DocumentsDocumentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        $data['file_type'] = pathinfo($data['file_path'], PATHINFO_EXTENSION);
        $data['file_size'] = filesize(storage_path('app/public/' . $data['file_path']));

        return $data;
    }

    
}
