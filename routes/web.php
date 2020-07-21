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

Route::get('/', 'FrontController@home')->name('front.home');
Route::get('/pizzas', 'FrontController@pizzas')->name('front.pizzas');
Route::get('/single_pizza/{pizza}', 'FrontController@pizza')->name('front.pizza');

/*CART*/
Route::get('/addToCart/{pizza}', 'FrontController@addToCart')->name('front.addToCart');
Route::get('/buy_now/{pizza}', 'FrontController@buyNow')->name('front.buyNow');
Route::get('/clearCart', 'FrontController@clearCart')->name('front.clearCart');
Route::get('/cart', 'FrontController@cart')->name('front.cart');
Route::get('/orderForm', 'FrontController@orderForm')->name('front.orderForm');

Route::get('/order/{order}', 'OrderController@show')->name('order.show');
Route::post('/order', 'OrderController@store')->name('order.store');

Route::get('/contact', 'FrontController@contact')->name('front.contact');


Auth::routes();

Route::middleware('auth')->group(function(){
	Route::get('/order_history', 'FrontController@orderHistory')->name('front.orderHistory');
});




Route::middleware('admin')->group(function(){
	Route::get('/home', 'HomeController@index')->name('admin.home');
	Route::resource('pizza', 'PizzaController');
});
