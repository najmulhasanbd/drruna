<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    protected $cacheKey = 'settings';

    // Get settings from cache or database
    public function getSetting(): array
    {
        return Cache::rememberForever($this->cacheKey, function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    // Set settings into config
    public function setSetting(): void
    {
        $settings = $this->getSetting();
        config()->set('settings', $settings);
    }

    // Clear cache
    public function clearCachedSetting(): void
    {
        Cache::forget($this->cacheKey);
    }
}
