<?php

namespace App\Providers;

use App\Product;
use Illuminate\Support\ServiceProvider;

class FeacturedProductProvider extends ServiceProvider
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
                $feacturedproducts = Product::get_active_products()->orderBy('id', 'DESC')->paginate(12);
                /* dd($business); */
                $view->with('web_feacturedproducts', $feacturedproducts);
            }
        );
    }
}
