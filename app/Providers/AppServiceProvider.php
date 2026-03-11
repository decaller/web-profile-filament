<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \RalphJSmit\Laravel\SEO\Facades\SEOManager::SEODataTransformer(function (\RalphJSmit\Laravel\SEO\Support\SEOData $SEOData): \RalphJSmit\Laravel\SEO\Support\SEOData {
            $settings = \App\Models\Setting::first();
            
            if ($settings) {
                $SEOData->site_name = $settings->site_title;
                $SEOData->description ??= $settings->site_description;
                if ($settings->site_favicon) {
                    $SEOData->favicon = \Illuminate\Support\Facades\Storage::url($settings->site_favicon);
                }
                if ($settings->site_logo) {
                    $SEOData->image ??= \Illuminate\Support\Facades\Storage::url($settings->site_logo);
                }

                // Override Analytics config
                if ($settings->analytics_property_id) {
                    config(['analytics.property_id' => $settings->analytics_property_id]);
                }

                if ($settings->analytics_service_account_json) {
                    $decodedJson = json_decode($settings->analytics_service_account_json, true);
                    if (is_array($decodedJson)) {
                        config(['analytics.service_account_credentials_json' => $decodedJson]);
                    }
                }
            }

            return $SEOData;
        });
    }
}
