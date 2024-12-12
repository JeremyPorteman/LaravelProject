<?php

namespace App\Providers;

use App\Services\RateService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class RateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RateService::class, function(Application $app) {
            return new RateService(config("api.api_url"));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
