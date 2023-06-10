<?php

namespace App\Providers;

use App\Services\Statuses\StatusService;
use Illuminate\Support\ServiceProvider;

class StatusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Services\Statuses\StatusServiceInterface', StatusService::class);
    }
}
