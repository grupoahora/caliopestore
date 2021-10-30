<?php

namespace App\Providers;

use App\Subcategory;
use Illuminate\Support\ServiceProvider;

class SubCategoryProvider extends ServiceProvider
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
                $subcategories = Subcategory::get();
                /* dd($subcategories); */
                $view->with('web_subcategories', $subcategories);
            }
        );
    }
}
