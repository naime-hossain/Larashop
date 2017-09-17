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



// Routes For showing login,logout,register,password reset,Route
Auth::routes();


//Route For installing Initial Database tables,This route will not avilable after one request or successfully create databases tables.

$tables_exists= DB::select('SHOW TABLES');
if (!$tables_exists) {
Route::get('/install','InstallController@index');
Route::post('/install','InstallController@install');
}




// Route For Showing the Home Page
Route::get('/','HomeController@index')->name('home');

// route for show all products
Route::get('/products','HomeController@Products')->name('products');

// show single product
Route::get('/product/{id}','HomeController@product')->name('home.product');

// archieve route
Route::get('/archive/{type}/{name}','HomeController@archive')->name('home.archive');

// show user edit form
Route::get('/user/{name}','UserController@edit')->name('user.edit');

// update user
Route::put('/user/{id}','UserController@update')->name('user.update');

// search route
// Route::get('/search','HomeController@searchpage');
Route::get('/search','HomeController@search')->name('search');

//user order listing route
 Route::get('/orders/{status?}','UserController@order')->name('order');
 


//cart items
Route::resource('cart', 'CartController',['except'=>['create','edit','store']]);

// add itrm to cart
Route::post('/cart/{product_id}','CartController@add')->name('cart.add');


//checkout form route

Route::get('/checkout','CheckoutController@checkout')->name('checkout');

// store customer address
Route::post('/checkout','CheckoutController@store')->name('checkout.shiping');


//procced to payment route and stroe address
Route::post('/storeAddress','AddressController@store');

// procced to payment route show payment from
Route::get('/payment','CheckoutController@paymentForm')->name('payment');


//  stripe payment processing
Route::post('/stripepayment','CheckoutController@storePayment')->name('storepayment');

// route for view/blade file for paypal(not used)
Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));


// route for post request of paypal payment
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'PaypalController@postPaymentWithpaypal',));

// route for check status responce
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));


// store order after successful payment
Route::get('/placeOrder','CheckoutController@placeOrder')->name('order.store');

// add review
   Route::post('/review/{product_id}','ReviewController@store');

// pages Routes
    $page=PageSetting::first();
    if ($page) {
       if ($page->contactUs) {
      Route::get('/contact','PageController@contact')->name('contact.show');
      Route::post('/contact','PageController@message')->name('contact');
    }
     if ($page->returnPolicy) {
      Route::get('/returnpolicy','PageController@returnPolicy')->name('returnPolicy');
    }
     if ($page->termsAndConditions) {
      Route::get('/terms&conditions','PageController@termsAndConditions')->name('terms&conditions');
    }
    }




//Admin routes are listing here
Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
    //show dashboard
    Route::get('/','AdminController@index');


   // admin user crud
    Route::resource('/users','AdminUsersController',['except'=>['create']]);
   
   // admin product crud
    Route::resource('/products','AdminProductsController',['except'=>['index','show']]);

    // show products according to stock level
    Route::get('/products/{status?}','AdminProductsController@index')->name('products.index');

// remove product photo
    Route::get('/products/{product_id}/removephoto/{photo_id}','AdminProductsController@remove_photo')->name('photo.remove');


// admin category crud
    Route::resource('/categories','AdminCategoriesController',['except'=>['show','edit','create']]);

    // admin type crud
     Route::resource('/types','AdminTypesController',['except'=>['show','edit','create']]);

     // order show according to order satus
   Route::get('/orders/{status?}','AdminOrderController@index')->name('admin.orders');


   // Route::get('/orders/pending','AdminOrderController@pending')->name('order.pending');
   // Route::get('/orders/delivered','AdminOrderController@delivered')->name('order.delivered');

   // update order status
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
    Route::get('/sendreply/{messageid?}','AdminMessageController@replyform')->name('replyfrom');
    Route::post('/sendreply','AdminMessageController@sendmessage')->name('reply');
    Route::delete('/messaged','AdminMessageController@delete')->name('message.delete');

});

  
   

