<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('payment/expresscheckout', 'PaypalController@ExpressCheckout');
Route::get('payment/subscribe', 'PaypalController@Subscribe');
Route::get('payment/success', 'PaypalController@Success');
Route::post('ipn-resolver','PayPalController@Notify');