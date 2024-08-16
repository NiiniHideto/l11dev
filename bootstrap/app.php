<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('admin')->as('admin.')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        // MiddlewareのAuthenticate.phpに書いてたもの
        $middleware->redirectGuestsTo(function (Request $request) {
            // $request->is('admin*') ? route('admin.login') : route('login');
            if ($request->routeIs('admin.*')) {
                return route('admin.login');
            }
            return route('login');
        });

        // 承認後の遷移ページ
        // Middleware の RedirectIfAuthenticated に書いてたもの 
        //      config で route はダメ？ Class "config" does not exist 
        //      Auth::guard('admin')はファサードで A facade root has not been set.
        // if (Auth::guard('admin')->check()) {
        //     return route('admin.dashboard');
        // }
        // return route('dashboard');
        // とりあえず、$middleware の中で実行するようにしてみる
        $middleware->redirectUsersTo(function (Request $request) {
            if (Auth::guard('admin')->check()) {
                return route('admin.dashboard');
            }
            return route('dashboard');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
