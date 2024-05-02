<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Logo;
use App\Models\Motivation;
use Schema;
use Illuminate\Pagination\Paginator;
use Auth;

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
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {

            
            $logo = Logo::first();
            $orgs=Auth::user();
            $motivationr = Motivation::first();
            $view->with('motivationr', $motivationr);
         
            $view->with('logo', $logo);
            $view->with('orgs', $orgs);
        });
        Paginator::useBootstrap();
    }
}
