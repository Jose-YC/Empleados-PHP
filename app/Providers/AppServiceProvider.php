<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
    public function boot(): void
    {
        //
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $usuarioLogeado = Auth::user()->usunombre ;
                $view->with('usuarioLogeado', $usuarioLogeado);
            }
        });
    }
}
