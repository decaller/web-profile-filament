<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                \Filament\Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                \Filament\Forms\Components\DatePicker::make('date')
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('gallery')
                    ->multiple()
                    ->reorderable()
                    ->image()
                    ->directory('activities')
                    ->columnSpanFull(),
                \Filament\Forms\Components\RichEditor::make('content')
                    ->columnSpanFull(),
                Section::make('SEO')
                    ->collapsed()
                    ->schema([
                        \RalphJSmit\Filament\SEO\SEO::make(),
                    ]),
            ]);
    }
}
