<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        // Using class based composers...
        View::composer(
            '*', 'App\Http\ViewComposers\UserComposer'
        );
        View::composer(
            'event.filter', 'App\Http\ViewComposers\FilterComposer'
        );
        View::composer(
            'shared.about', 'App\Http\ViewComposers\AboutComposer'
        );
        View::composer(
            ['event.create', 'event.edit'], 'App\Http\ViewComposers\EventCategoryComposer'
        );

        // Using Closure based composers...
        View::composer('dashboard', function ($view) {
            //
        });
    }
}