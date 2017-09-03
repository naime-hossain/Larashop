<?php

use App\PageSetting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');



Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','HomeController@index')->name('home');
Route::get('/products','HomeController@Products')->name('products');
Route::get('/product/{id}','HomeController@product')->name('home.product');
Route::get('/archive/{type}/{name}','HomeController@archive')->name('home.archive');
Route::get('/user/{name}','UserController@edit')->name('user.edit');
Route::put('/user/{id}','UserController@update')->name('user.update');
//user order route
 Route::get('/orders/{status?}','UserController@order')->name('order');
 


//cart
Route::resource('cart', 'CartController',['except'=>['create','edit','store']]);
Route::post('/cart/{product_id}','CartController@add')->name('cart.add');
//checkout route


Route::get('/checkout','CheckoutController@checkout')->name('checkout');
Route::post('/checkout','CheckoutController@store')->name('checkout.shiping');
//procced to payment route and stroe address
Route::post('/storeAddress','AddressController@store');
Route::get('/payment','CheckoutController@paymentForm')->name('payment');

Route::post('/payment','CheckoutController@storePayment')->name('storepayment');
Route::get('/placeOrder','CheckoutController@placeOrder')->name('order.store');
// add review
   Route::post('/review/{product_id}','ReviewController@store');



//Admin routes
Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
    //
    Route::get('/','AdminController@index');

    Route::resource('/users','AdminUsersController',['except'=>['create']]);
   
    Route::resource('/products','AdminProductsController',['except'=>['index','show']]);
    Route::get('/products/{status?}','AdminProductsController@index')->name('products.index');
    Route::get('/products/{product_id}/removephoto/{photo_id}','AdminProductsController@remove_photo')->name('photo.remove');

    Route::resource('/categories','AdminCategoriesController',['except'=>['show','edit','create']]);
     Route::resource('/types','AdminTypesController',['except'=>['show','edit','create']]);
   Route::get('/orders/{status?}','AdminOrderController@index')->name('admin.orders');
   // Route::get('/orders/pending','AdminOrderController@pending')->name('order.pending');
   // Route::get('/orders/delivered','AdminOrderController@delivered')->name('order.delivered');
    Route::put('/orders/{order_id}','AdminOrderController@update')->name('order.update');

    // app settings routes

// general setting
    Route::resource('settings/general','AdminGeneralSettingController',['except'=>['show','edit','create','destroy']]);
  // Route::get('settings/general','AdminGeneralSettingController@index')->name('general.index');
  //   Route::post('settings/general/{id?}','AdminGeneralSettingController@update')->name('general.update');
    // social setting
    Route::resource('settings/social','AdminSocialSettingController',['except'=>['show','edit','create','destroy']]);

    // page setting
    Route::resource('settings/page','AdminPageController',['except'=>['show','edit','create','destroy']]);
     // shop setting
    Route::resource('settings/shop','AdminShopSettingController',['except'=>['show','edit','create','destroy']]);
    // message controller
    Route::resource('/message','AdminMessageController');


});

  // pages controller
    $page=PageSetting::first();
    if ($page) {
       if ($page->contactUs) {
      Route::get('/contact','PageController@contact')->name('contact');
      Route::post('/contact','PageController@message')->name('contact');
    }
     if ($page->returnPolicy) {
      Route::get('/returnpolicy','PageController@returnPolicy')->name('returnPolicy');
    }
     if ($page->termsAndConditions) {
      Route::get('/terms&conditions','PageController@termsAndConditions')->name('terms&conditions');
    }
    }
   

