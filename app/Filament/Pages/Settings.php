<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Settings extends Page
{
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Basic Info';
    protected static ?string $title = 'Basic Info';
    
    public static function getNavigationGroup(): ?string 
    { 
        return __('Settings'); 
    }

    public ?array $data = [];

    protected string $view = 'filament.pages.settings';

    public function mount(): void
    {
        $setting = \App\Models\Setting::first();
        
        if ($setting) {
            $this->form->fill($setting->toArray());
        }
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make(__('General Settings'))
                    ->description(__('Manage site title, logo, and favicon.'))
                    ->components([
                        \Filament\Forms\Components\TextInput::make('site_title')
                            ->label(__('Site Title'))
                            ->maxLength(255),
                        \Filament\Forms\Components\Textarea::make('site_description')
                            ->label(__('Site Description'))
                            ->columnSpanFull(),
                        \Filament\Forms\Components\FileUpload::make('site_logo')
                            ->label(__('Site Logo'))
                            ->image()
                            ->directory('settings/logo'),
                        \Filament\Forms\Components\FileUpload::make('site_favicon')
                            ->label(__('Site Favicon'))
                            ->image()
                            ->directory('settings/favicon'),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make(__('Contact Information'))
                    ->description(__('Contact details displayed in the footer.'))
                    ->components([
                        \Filament\Forms\Components\TextInput::make('contact_email')
                            ->label(__('Email Address'))
                            ->email()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('contact_phone')
                            ->label(__('Phone Number'))
                            ->tel()
                            ->maxLength(255),
                        \Filament\Forms\Components\Textarea::make('contact_address')
                            ->label(__('Physical Address'))
                            ->columnSpanFull(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make(__('Social Links'))
                    ->description(__('Links to social media accounts.'))
                    ->components([
                        \Filament\Forms\Components\Repeater::make('social_links')
                            ->label('')
                            ->schema([
                                \Filament\Forms\Components\TextInput::make('platform')
                                    ->label(__('Platform Name'))
                                    ->required(),
                                \Filament\Forms\Components\TextInput::make('url')
                                    ->label(__('URL'))
                                    ->url()
                                    ->required(),
                                \Filament\Forms\Components\TextInput::make('icon')
                                    ->label(__('Icon Class (e.g. fas fa-facebook)'))
                                    ->nullable(),
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Efficiently save all fields at once
        $setting = \App\Models\Setting::first() ?? new \App\Models\Setting();
        $setting->fill($data);
        $setting->save();

        \Filament\Notifications\Notification::make()
            ->success()
            ->title(__('Settings saved'))
            ->send();
    }
}
