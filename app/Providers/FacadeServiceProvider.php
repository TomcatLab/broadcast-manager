<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('bbc',function() {
            return new \App\Helpers\Bbc;
        });
        App::bind('cnn',function() {
            return new \App\Helpers\Cnn;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
