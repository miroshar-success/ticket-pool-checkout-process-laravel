<?php

namespace App\Providers;

use \App\Models\Setting;
use \App\Models\Currency;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //
        Schema::defaultStringLength(191);      
        view()->composer('*', function ($view) {
            if(env('DB_DATABASE')!=null){
                $cur = Setting::find(1)->currency; 
                $currency = Currency::where('code',$cur)->first()->symbol; 
                $view->with('currency', $currency);
            }         
        });
    }
}
