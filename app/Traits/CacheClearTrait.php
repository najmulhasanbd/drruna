<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheClearTrait
{
    protected static function bootCacheClearTrait()
    {
        static::saved(function () {
            static::clearAllCaches();
        });

        static::deleted(function () {
            static::clearAllCaches();
        });
    }

    /**
     * সব ডাইনামিক ক্যাশ একসাথে ক্লিয়ার করার জন্য
     */
    protected static function clearAllCaches()
    {
        Cache::forget('frontend_data');
        Cache::forget('video_page_data');
        Cache::forget('service_page_data');
        Cache::forget('faq_page_data');
        
        // View::share এর ডাটা আপডেট করার জন্য নিচের দুটি লাইন
        Cache::forget('global_services');
        Cache::forget('global_specialists');

        // গ্যালারির সব পেজ ক্লিয়ার করার জন্য
        Cache::flush(); 
    }
}