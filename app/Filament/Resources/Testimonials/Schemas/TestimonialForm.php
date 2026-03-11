<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('author_name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('author_title')
                    ->maxLength(255),
                \Filament\Forms\Components\FileUpload::make('avatar')
                    ->image()
                    ->directory('testimonials')
                    ->columnSpanFull(),
                \Filament\Forms\Components\Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }
}
