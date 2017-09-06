<?php

namespace App\Providers;

use App\ShopSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //set default string length for db table field
        Schema::defaultStringLength(191);

        // global variable for sidebar
        view()->composer('layouts.sidebar',function($view){

            $view->with('categories',\App\Category::has('products')->get());
     
            $view->with('types',\App\Type::has('products')->get());
        });
 // global variable for footer
          view()->composer('layouts.footer',function($view){

            $view->with('categories',\App\Category::has('products')->latest()->take(5)->get());
            $view->with('types',\App\Type::has('products')->latest()->take(5)->get());
       
            $view->with('social',\App\SocialSetting::first());
       
            $view->with('page',\App\PageSetting::first());
        });  
  // global variable for all view
         view()->composer('*', function($view)
      {
        $view->with('GeneralSetting',\App\GeneralSetting::first());
     });
 
 // set the .env/environment variable from database
         $generalSetting=\App\GeneralSetting::first();
         $shopSetting=\App\ShopSetting::first();
         if ($generalSetting) {
              if ($generalSetting->site_name) {
            config(['app.name'=>$generalSetting->site_name]);
             }
         }
        if ($shopSetting) {
            if ($shopSetting->tax) {
                 config(['cart.tax'=>$shopSetting->tax]);
            }
           
             if ($shopSetting->stripe_key) {
                 config(['services.stripe.key'=>$shopSetting->stripe_key]);
            }

            if ($shopSetting->stripe_secret) {
                 config(['services.stripe.secret'=>$shopSetting->stripe_key]);
            }
        }
           
           
            // config(['mail.from.address'=>$generalSettings->site_name]);
            
        
        

 
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
