<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        // Inertia::share('flash', function(){
        //     return[
        //         'success'=>Session::get('success'),
        //     ];
        // });

        //Validation de forms
        Inertia::share([
            'erros'=>function(){
                return Session::get('erros')
                ? Session::get('errors')->getBag('default')->getMessages()
                :(object)[];
            },
        ]);
    }
}
