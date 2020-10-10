<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//     return view('front_end.master');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index');
    Route::get('/dashoard', 'HomeController@dashoard');
});


//frontend
Route::get('/', 'FrontendController@home');

//contact
Route::get('/frontend_contact', 'ContactController@contact');
Route::post('/send_contact', 'ContactController@save_contact');



//category
Route::get('/category', 'CategoryController@category');
Route::post('/add_category', 'CategoryController@add_category');
Route::get('/edit_category/{id}', 'CategoryController@edit_category');
Route::post('/update_category', 'CategoryController@update_category');
Route::get('/delete_category/{id}', 'CategoryController@delete_category');

//slider
Route::get('/slider', 'SliderController@slider');
Route::post('/save_slider', 'SliderController@save_slider');
Route::get('/edit_slider/{id}', 'SliderController@edit_slider');
Route::post('/update_slider', 'SliderController@update_slider');
Route::get('/delete_slider/{id}', 'SliderController@delete_slider');


//item
Route::get('/item', 'ItemController@item');
Route::get('/add_item', 'ItemController@add_item');
Route::post('/save_item', 'ItemController@save_item');
Route::get('/edit_item/{id}', 'ItemController@edit_item');
Route::post('/update_item', 'ItemController@update_item');
Route::get('/delete_item/{id}', 'ItemController@delete_item');


//cart
Route::post('/add_to_cart', 'CartController@add_to_cart' );
Route::get('/cart', 'CartController@cart' );

//checkout
Route::get('/checkout', 'CheckoutController@index');
Route::post('/place_the_order', 'CheckoutController@place_the_order');

//stripe

Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');


//order

Route::get('/pending_order', 'OrderController@index');
Route::get('/confirm_order/{id}', 'OrderController@confirm_order');
Route::get('/decline_order/{id}', 'OrderController@decline_order');
Route::get('/complete_orders', 'OrderController@complete_orders');
Route::get('/decline_orders', 'OrderController@decline_orders');
Route::get('/view_order_details', 'OrderController@view_order_details');
Route::get('/print_order', 'OrderController@print_order');
