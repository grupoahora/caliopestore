<?php

namespace App\Providers;

use App\Tag;
use Illuminate\Support\ServiceProvider;

class TagProvider extends ServiceProvider
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
                /* $products */
                $tags = Tag::whereHas('products', function($query){
                    $query;
                })->get();
               /*  dd($tags); */
                $view->with('web_tags', $tags);
            }
        );
    }
}
