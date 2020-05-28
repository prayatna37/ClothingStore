<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/product/details/{id}', 'ProductController@detail')->name('product.details');

Route::get('/checkout/{id}', 'ProductController@checkout')->name('checkout.index');
// Route::get('/cart', 'CartController@index');

Route::get('/products', 'ProductController@show')->name('product.all');
Route::get('/products/men', 'ProductController@men')->name('product.men');
Route::get('/products/women', 'ProductController@women')->name('product.men');

Route::get('/cart', 'CartController@index')->name("cart.index");
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{productid}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');


Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::get('/clear-cart',  'CartController@clearCart')->name('cart.clear');

Route::get('/empty',  'SaveForLaterController@clearSaveForLater')->name('saveForLater.clear');



Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::POST('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

// Route::get('/empty',   function () {
//     Cart::instance('saveForLater')->destroy();
// });

Route::get('/contact', 'HomeController@contact');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
