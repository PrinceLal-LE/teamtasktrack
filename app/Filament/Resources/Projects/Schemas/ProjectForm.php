<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Models\Project;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: false)
                    ->debounce(300)
                    ->afterStateUpdated(function ($set, ?string $state, $livewire) {
                        // Auto-generate slug from name (no number suffix)
                        if (!empty($state)) {
                            $slug = Str::slug($state);
                            $set('slug', $slug);
                            
                            // Check if name is available and set icon
                            $excludeId = $livewire->record->id ?? null;
                            $isAvailable = !Project::where('name', $state)
                                ->when($excludeId, fn($query) => $query->where('id', '!=', $excludeId))
                                ->exists();
                            
                            $livewire->nameAvailable = $isAvailable;
                            
                            // Clear validation errors when typing
                            $livewire->resetErrorBag('data.name');
                        } else {
                            $livewire->nameAvailable = null;
                            $livewire->resetErrorBag('data.name');
                        }
                    })
                    ->suffixIcon(function ($state, $livewire) {
                        if (empty($state)) {
                            return null;
                        }
                        
                        $isAvailable = $livewire->nameAvailable ?? null;
                        
                        if ($isAvailable === true) {
                            return 'heroicon-o-check-circle';
                        } elseif ($isAvailable === false) {
                            return 'heroicon-o-x-circle';
                        }
                        
                        return null;
                    })
                    ->suffixIconColor(function ($state, $livewire) {
                        if (empty($state)) {
                            return null;
                        }
                        
                        $isAvailable = $livewire->nameAvailable ?? null;
                        
                        if ($isAvailable === true) {
                            return 'success';
                        } elseif ($isAvailable === false) {
                            return 'danger';
                        }
                        
                        return null;
                    })
                    ->rules([
                        function ($livewire) {
                            return function (string $attribute, $value, \Closure $fail) use ($livewire) {
                                // Only validate on submit, not during typing
                                if (empty($value)) {
                                    return;
                                }
                                
                                $excludeId = $livewire->record->id ?? null;
                                $exists = Project::where('name', $value)
                                    ->when($excludeId, fn($query) => $query->where('id', '!=', $excludeId))
                                    ->exists();
                                
                                if ($exists) {
                                    $fail('This project name is already taken. Please choose a different name.');
                                }
                            };
                        },
                    ])
                    ->dehydrated()
                    ->helperText(function ($state, $livewire) {
                        if (empty($state)) {
                            return 'Project name must be unique. The slug will be auto-generated from the name as you type.';
                        }
                        
                        $isAvailable = $livewire->nameAvailable ?? null;
                        
                        if ($isAvailable === true) {
                            return new HtmlString('<span style="color: #22c55e;">✓ Project name is available</span>');
                        } elseif ($isAvailable === false) {
                            return new HtmlString('<span style="color: #ef4444;">✗ This project name is already taken. Please choose a different name.</span>');
                        }
                        
                        return 'Checking availability...';
                    }),
                TextInput::make('slug')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->label('Slug')
                    ->unique(
                        table: Project::class,
                        column: 'slug',
                        ignoreRecord: true
                    )
                    ->visible(fn ($get) => !empty($get('name')))
                    ->validationMessages([
                        'unique' => 'A project with this slug already exists. Please choose a different project name.',
                    ]),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('team_id')
                    ->label('Team')
                    ->relationship('team', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'active' => 'Active',
                        'deactive' => 'Deactive',
                    ])
                    ->required()
                    ->default('active'),
            ]);
    }
}
