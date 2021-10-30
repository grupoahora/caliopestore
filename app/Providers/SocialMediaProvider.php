<?php

namespace App\Providers;

use App\SocialMedia;
use Illuminate\Support\ServiceProvider;

class SocialMediaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            "*",
            function ($view) {
                $socialmedias =  SocialMedia::get();
                /* dd($subcategories); */
                $view->with('web_socialmedias', $socialmedias);
            }
        );
    }
}
