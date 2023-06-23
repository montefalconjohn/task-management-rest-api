<?php

namespace App\Providers;

use App\Services\Trash\TrashService;
use Illuminate\Support\ServiceProvider;

class TrashServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Services\Trash\TrashServiceInterface', TrashService::class);
    }
}
