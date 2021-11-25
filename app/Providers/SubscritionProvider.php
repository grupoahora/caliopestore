<?php

namespace App\Providers;

use App\Business;
use App\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class SubscritionProvider extends ServiceProvider
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
                if (Auth::user()) {
                    $email = auth()->user()->email;
                    $subscription = Subscription::where('email', $email)->first();
                    if ($subscription === null) {
                        
                        $subscription = new Subscription();
                        $subscription->email = "asd";
                        /* dd($subscription); */
                        
                        $view->with('web_subscription', $subscription)->with('web_email_user', $email);
                    }else{
                        $view->with('web_subscription', $subscription)->with('web_email_user', $email);
                    }
                } 
                
                
            }
        );
    }
}
