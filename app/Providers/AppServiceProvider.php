<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Services\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {   
        $settings = Settings::getSystemSettings();

        $langs = explode(',', $settings['locales'] ?? $settings['locale'] ?? 'en');

        $filament_langs = config('filament-language-switch.locales');
        foreach ($filament_langs as $key => $item) {
            if (!in_array($key, $langs)) {
                unset($filament_langs[$key]);
            }
        }
        
        config([
            'translatable.fallback_locale' => $settings['locale'] ?? 'en',
            'translatable.locales' => $langs,
            'filament.brand' => 'Filament',
            'filament-language-switch.locales' => $filament_langs,
        ]);
        
        // lang switch
        if (in_array($request->segment(1), $langs)) {
            app()->setLocale($request->segment(1));
        }
    }
}
