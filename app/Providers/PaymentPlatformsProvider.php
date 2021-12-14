<?php

namespace App\Providers;

use App\PaymentPlatform;
use Illuminate\Support\ServiceProvider;

class PaymentPlatformsProvider extends ServiceProvider
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
                $paymentplatforms = PaymentPlatform::all();
                /* dd($business); */
                $view->with('web_paymentplatforms', $paymentplatforms);
            }
        );
    }
}
