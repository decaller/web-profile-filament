<?php

namespace App\Filament\Resources\Publications\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class PublicationForm
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
                \Filament\Forms\Components\FileUpload::make('document_file')
                    ->label('Document File (PDF, etc)')
                    ->directory('publications')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->required()
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('gallery')
                    ->multiple()
                    ->reorderable()
                    ->image()
                    ->directory('publications/gallery')
                    ->columnSpanFull(),
                \Filament\Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Section::make('SEO')
                    ->collapsed()
                    ->schema([
                        \RalphJSmit\Filament\SEO\SEO::make(),
                    ]),
            ]);
    }
}
