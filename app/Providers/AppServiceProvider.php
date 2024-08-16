<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // if (request()->is('admin/*')) {
        //     config(['session.cookie' => config('session.cookie_admin')]);
        // }

        //追加
        Paginator::defaultView('default');
        Paginator::defaultSimpleView('simple-default');
    }
}
