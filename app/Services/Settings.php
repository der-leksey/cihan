<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\SystemSetting;

class Settings
{
    public static function getSystemSettings()
    {
        $settings = SystemSetting::all()->pluck('value', 'name');
        return $settings;
    }

    public static function getSettings()
    {
        $settings = Setting::all()->pluck('value', 'name');
        return $settings;
    }
}

