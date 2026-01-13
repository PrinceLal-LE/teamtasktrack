<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;
    
    public ?bool $nameAvailable = null;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ensure slug is generated if not set (no number suffix)
        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['name']);
        }
        
        // Set owner_id to the logged-in user
        $data['owner_id'] = auth()->id();
        
        return $data;
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
