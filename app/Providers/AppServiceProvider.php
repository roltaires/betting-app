<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('sellingprice', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();

            return (double) $value > ((double) $data['total_wager_value'] * ((double) $data['selling_percentage'] / 100));
        });

        Validator::replacer('sellingprice', function ($message, $attribute, $rule, $parameters) {
            return "Selling price must be greater than Total Wager Value x (Selling Percentage / 100)";
        });
    }
}
