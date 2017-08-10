<?php

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
 Route::get('/orders','UserController@order')->name('order');


//cart
Route::resource('cart', 'CartController');

//checkout route


Route::get('/checkout','CheckoutController@checkout')->name('checkout');
Route::post('/checkout','CheckoutController@store')->name('checkout.shiping');
//procced to payment route and stroe address
Route::post('/storeAddress','AddressController@store');
Route::get('/payment','CheckoutController@paymentForm')->name('payment');
Route::post('/payment','CheckoutController@storePayment')->name('storepayment');

// add review
   Route::post('/review/{product_id}','ReviewController@store');



//Admin routes
Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
    //
    Route::get('/', function () {
    return view('admin.index');
});

    Route::resource('/users','AdminUsersController',['except'=>['create']]);
   
    Route::resource('/products','AdminProductsController');
    Route::get('/products/{product_id}/removephoto/{photo_id}','AdminProductsController@remove_photo')->name('photo.remove');

    Route::resource('/categories','AdminCategoriesController',['except'=>['show','edit','create']]);
     Route::resource('/types','AdminTypesController',['except'=>['show','edit','create']]);
   Route::get('/orders','AdminOrderController@index')->name('admin.orders');
   Route::get('/orders/pending','AdminOrderController@pending')->name('order.pending');
   Route::get('/orders/delivered','AdminOrderController@delivered')->name('order.delivered');






 


});
