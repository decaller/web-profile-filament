<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Setting;
use Filament\Notifications\Notification;

class AnalyticSettings extends Page
{
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationLabel = 'Analytic';
    protected static ?string $title = 'Analytic';
    
    public static function getNavigationGroup(): ?string 
    { 
        return __('Settings'); 
    }

    public ?array $data = [];

    protected string $view = 'filament.pages.settings'; // Reusing the same view if it's generic enough

    public function mount(): void
    {
        $setting = Setting::first();
        
        if ($setting) {
            $this->form->fill([
                'analytics_property_id' => $setting->analytics_property_id,
                'analytics_service_account_json' => $setting->analytics_service_account_json,
            ]);
        }
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make(__('Google Analytics Configuration'))
                    ->description(__('Set up your Google Analytics 4 property and service account.'))
                    ->components([
                        \Filament\Forms\Components\TextInput::make('analytics_property_id')
                            ->label(__('GA4 Property ID'))
                            ->placeholder('e.g. 123456789')
                            ->helperText(__('You can find this in your Google Analytics Admin > Property Settings > Property Details.'))
                            ->required(),
                        \Filament\Forms\Components\TextInput::make('analytics_service_account_json')
                            ->label(__('Service Account JSON'))
                            ->helperText(__('Paste the content of your service account JSON file here.'))
                            ->required(),
                    ])->columns(1),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $setting = Setting::first() ?? new Setting();
        $setting->analytics_property_id = $data['analytics_property_id'];
        $setting->analytics_service_account_json = $data['analytics_service_account_json'];
        $setting->save();

        Notification::make()
            ->success()
            ->title(__('Analytic settings saved'))
            ->send();
    }
}
