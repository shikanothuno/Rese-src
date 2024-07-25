<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Stripe\Stripe;

class StripeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('stripe', function () {
            return new Stripe();
        });
    }

    public function boot()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }
}
