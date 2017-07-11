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
Route::get('/products','HomeController@Products')->name('home.products');
Route::get('/product/{id}','HomeController@product')->name('home.product');


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
 


});
