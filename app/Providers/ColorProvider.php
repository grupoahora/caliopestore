<?php

namespace App\Providers;

use App\Color;
use App\Texture;
use Illuminate\Support\ServiceProvider;

class ColorProvider extends ServiceProvider
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
                $categories = Texture::get();
                /* dd($categories); */
                $view->with('web_colors', $categories);
            }
        );
    }
}
