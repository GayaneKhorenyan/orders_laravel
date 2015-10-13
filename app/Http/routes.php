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


Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController'
]);

Route::get('/','OrderController@index');

Route::get('orders','OrderController@orders');

Route::get('add_order','OrderController@add_order');

Route::post('save_order','OrderController@save_order');

Route::get('view_order/{id}','OrderController@view_order')->where('id', '[0-9]+');

Route::get('get_order/{id}','OrderController@get_order')->where('id', '[0-9]+');

Route::get('delete_order/{id}','OrderController@delete_order')->where('id', '[0-9]+');

Route::post('save_order_list','OrderController@save_order_list');