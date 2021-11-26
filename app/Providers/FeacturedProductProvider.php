<?php

namespace App\Providers;

use App\Product;
use Illuminate\Support\Facades\DB;
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
                $feacturedproducts =
                Product::withCount(['ratings as average_rating' => function ($query) {
                    $query->select(DB::raw('coalesce(avg(rating),0)'));
                }])->orderByDesc('average_rating')->get(12)->take(12);
                /* dd($feacturedproducts); */
                $view->with('web_feacturedproducts', $feacturedproducts);
            }
        );
    }
}
