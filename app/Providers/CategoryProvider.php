<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
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
                $categories = Category::whereHas('products', function ($query) {
                    $query;
                })->get();
                /* dd($categories); */
                $view->with('web_categories', $categories);
            }
        );
    }
}
