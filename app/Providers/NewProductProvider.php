<?php

namespace App\Providers;

use App\Product;
use Illuminate\Support\ServiceProvider;

class NewProductProvider extends ServiceProvider
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
                $hoy= date("Ymd");
                /* dd($hoy-1000); */
                $newproducts = Product::get_active_products()->whereDate('created_at', '>=' ,$hoy-7)->orderBy('id', 'DESC')->paginate(12);
                /* dd($newproducts); */
                $view->with('web_newproducts', $newproducts);
            }
        );
    }
}
