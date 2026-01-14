<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('file_path')
                    ->label('Upload File (Drag & Drop)')
                    ->disk('public')
                    ->directory('documents')
                    ->preserveFilenames()
                    ->enableDownload()
                    ->enableOpen()
                    ->multiple(false)
                    // ->required(fn (Schema $schema) => $schema->getOperation() === 'create')
                    ->maxSize(102400) // ✅ 100 MB (KB)
                    ->helperText('Drag & drop any file type. Max size: 100 MB'),
            ]);
    }
}
