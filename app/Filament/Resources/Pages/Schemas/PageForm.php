<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Str;
use RalphJSmit\Filament\SEO\SEO;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Builder::make('content')
                    ->columnSpanFull()
                    ->blocks([
                        Block::make('hero')
                            ->label('Hero Section')
                            ->icon('heroicon-m-photo')
                            ->schema([
                                TextInput::make('title')->required(),
                                TextInput::make('subtitle'),
                                FileUpload::make('background_image')->image()->directory('pages/hero'),
                                TextInput::make('primary_button_label'),
                                TextInput::make('primary_button_url'),
                            ]),
                        Block::make('challenge')
                            ->label('The Challenge / Pain Points')
                            ->icon('heroicon-m-exclamation-triangle')
                            ->schema([
                                TextInput::make('heading')->required(),
                                RichEditor::make('description'),
                            ]),
                        Block::make('solution')
                            ->label('Our Vision / Solution')
                            ->icon('heroicon-m-light-bulb')
                            ->schema([
                                TextInput::make('heading')->required(),
                                RichEditor::make('description'),
                            ]),
                        Block::make('programs')
                            ->label('Academic Programs / Features')
                            ->icon('heroicon-m-academic-cap')
                            ->schema([
                                TextInput::make('heading')->required(),
                                Repeater::make('items')
                                    ->schema([
                                        TextInput::make('title')->required(),
                                        TextInput::make('description'),
                                        TextInput::make('icon')->label('Heroicon Name (e.g. heroicon-o-book-open)'),
                                    ]),
                            ]),
                        Block::make('testimonials')
                            ->label('Testimonials / Social Proof')
                            ->icon('heroicon-m-chat-bubble-bottom-center-text')
                            ->schema([
                                TextInput::make('heading')->required(),
                                Repeater::make('items')
                                    ->schema([
                                        TextInput::make('quote')->required(),
                                        TextInput::make('author')->required(),
                                        TextInput::make('role')->label('Role (e.g. Parent, Alumni)'),
                                    ]),
                            ]),
                        Block::make('faq')
                            ->label('FAQ')
                            ->icon('heroicon-m-question-mark-circle')
                            ->schema([
                                TextInput::make('heading')->required(),
                                Repeater::make('questions')
                                    ->schema([
                                        TextInput::make('question')->required(),
                                        RichEditor::make('answer')->required(),
                                    ]),
                            ]),
                        Block::make('cta')
                            ->label('Call To Action')
                            ->icon('heroicon-m-cursor-arrow-rays')
                            ->schema([
                                TextInput::make('heading')->required(),
                                TextInput::make('text'),
                                TextInput::make('button_label')->required(),
                                TextInput::make('button_url')->required(),
                            ]),
                        Block::make('recent_blogs')
                            ->label('Recent Blogs/News')
                            ->icon('heroicon-m-newspaper')
                            ->schema([
                                TextInput::make('heading')->required()->default('Latest News'),
                                TextInput::make('count')->numeric()->default(3)->label('Number of posts to show'),
                            ]),
                        Block::make('dynamic_testimonials')
                            ->label('Testimonials (From Database)')
                            ->icon('heroicon-m-star')
                            ->schema([
                                TextInput::make('heading')->required()->default('What People Say'),
                                TextInput::make('count')->numeric()->default(3)->label('Number of testimonials to show'),
                            ]),
                        Block::make('recent_activities')
                            ->label('Recent Activities')
                            ->icon('heroicon-m-camera')
                            ->schema([
                                TextInput::make('heading')->required()->default('Recent Activities'),
                                TextInput::make('count')->numeric()->default(3)->label('Number of activities to show'),
                            ]),
                        Block::make('featured_publications')
                            ->label('Featured Publications')
                            ->icon('heroicon-m-document-text')
                            ->schema([
                                TextInput::make('heading')->required()->default('Featured Publications'),
                                TextInput::make('count')->numeric()->default(3)->label('Number of publications to show'),
                            ]),
                    ]),
                Section::make('SEO')
                    ->collapsed()
                    ->schema([
                        SEO::make(),
                    ]),
            ]);
    }
}
