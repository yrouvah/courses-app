<?php

namespace App\Providers;

use Inertia\Inertia;
use App\Models\Course;
use App\Policies\CoursePolicy;
use Illuminate\Auth\Access\Gate;
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
    protected $policies=[
        'App\Model\Course'=>'App\Policies\CoursePolicy',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Inertia::share('flash', function(){
                return[
                        'success'=>Session::get('success'),
                    ];
        });

        //Validation de forms
        Inertia::share([
            'erros'=>function(){
                return Session::get('errors')
                ? Session::get('errors')->getBag('default')->getMessages()
                :(object)[];
            },
        ]);


    }
}
