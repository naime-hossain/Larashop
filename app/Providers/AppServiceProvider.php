<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar',function($view){

            $view->with('categories',\App\Category::has('products')->get());
     

            $view->with('types',\App\Type::has('products')->get());
        });

          view()->composer('layouts.footer',function($view){

            $view->with('categories',\App\Category::has('products')->latest()->take(5)->get());
            $view->with('types',\App\Type::has('products')->latest()->take(5)->get());
       
            $view->with('social',\App\SocialSetting::first());
       
            $view->with('page',\App\PageSetting::first());
        });  

         view()->composer('*', function($view)
      {
        $view->with('GeneralSetting',\App\GeneralSetting::first());
     });

         $generalSettings=\App\GeneralSetting::first();
         if ($generalSettings) {
            config(['app.name'=>$generalSettings->site_name]);
            // config(['cart.tax'=>10]);
            // config(['mail.from.address'=>$generalSettings->site_name]);
            // config(['services.stripe.key'=>$generalSettings->site_name]);
        
         }

 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
