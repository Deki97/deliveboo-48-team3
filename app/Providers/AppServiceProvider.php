<?php

namespace App\Providers;
use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '7qfbpdbfqr8s4qmq',
                    'publicKey' => 'nvwpf2m4gc982fq8',
                    'privateKey' => 'f90eec4d7e3fc8ef1511f49ce73000c8'
                ]
            );
        });
    }
}