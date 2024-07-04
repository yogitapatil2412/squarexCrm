<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;

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
    public function boot()
    {
        //
        
        $general = GeneralSetting::first();
        $viewShare['general'] = $general;
        view()->share($viewShare);

        Paginator::useBootstrap();
    }
}
