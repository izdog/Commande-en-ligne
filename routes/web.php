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
Auth::routes();

Route::get('/', 'indexController@index');

//ORDER ROUTE
Route::get('/commander' , 'orderController@index');
Route::post('/addToBasket', 'orderController@addToBasket');
Route::get('/removeFromBasket', 'orderController@removeFromBasket');
Route::get('/destroy', 'orderController@destroyBasket');
Route::get('/commander/{category}', 'orderController@getProductByCategory');
Route::get('/customize', 'orderController@customize')->name('customize');
Route::post('/customize/toBasket', 'orderController@addToBasketCustomize')->name('customize.toBasket');

//CART ROUTE
Route::get('/basket', 'CartController@index');
Route::get('/panier', 'CartController@index');
Route::post('/basket/update', 'CartController@update')->name('update.basket');
Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::get('/checkout/paymentMethod', 'CartController@paymentMethod')->name('paymentMethod');

// USER ROUTE
Route::get('mon_compte', 'UserController@edit');
Route::put('mon_compte', 'UserController@update');
Route::get('/auth/confirm/{id}/{token}', 'Auth\RegisterController@getConfirm');
Route::get('/logout', 'LogoutController@logout');
Route::get('/success', 'Auth\RegisterController@success');

// ADMIN ROUTE
Route::resource('/admin/schelude', 'ScheludeController');
Route::resource('/admin/ingredients', 'IngredientController');
Route::resource('/admin', 'ProductController');

// PAYPAL ROUTE
Route::get('/checkout/paymentMethod/paypal', 'PayPalController@bringMyMoney')->name('payWithPaypal');
Route::get('/checkout/paymentMethod/paypalproccess', 'PayPalController@process')->name('paypalProcess');
Route::get('/checkout/paymentMethod/paypal/error', 'PaypalController@errors')->name('paypalCancel');


Route::get('/home', 'HomeController@index');