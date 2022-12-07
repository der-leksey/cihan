<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

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
        $langs = ['en', 'ru', 'tr'];
        $filament_langs = config('filament-language-switch.locales');
        foreach ($filament_langs as $key => $item) {
            if (!in_array($key, $langs)) {
                unset($filament_langs[$key]);
            }
        }

        config([
            'filament.brand' => 'Filament',
            'filament-language-switch.locales' => $filament_langs,
        ]);

        if (in_array($request->segment(1), $langs)) {
            app()->setLocale($request->segment(1));
        }

        if (in_array($request->segment(1), $langs)) {
            app()->setLocale($request->segment(1));
        }
    }
}
