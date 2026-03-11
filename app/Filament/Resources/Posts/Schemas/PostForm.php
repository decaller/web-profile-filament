<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;

class PostForm
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
                \Filament\Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('blog-images')
                    ->columnSpanFull(),
                \Filament\Forms\Components\RichEditor::make('content')
                    ->columnSpanFull(),
                \Filament\Forms\Components\DateTimePicker::make('published_at'),
            ]);
    }
}
