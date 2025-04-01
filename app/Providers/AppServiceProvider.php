<?php

namespace App\Providers;

use App\Models\Foglalas;
use App\Models\Rendez;
use App\Observers\FoglalasObserver;
use App\Observers\RendezObserver;
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
    public function boot()
    {
        Foglalas::observe(FoglalasObserver::class);
    }
}
