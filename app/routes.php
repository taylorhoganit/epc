<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::resource('/', 'OrdersController');
Route::controller('users', 'UsersController');


Route::resource('orders', 'OrdersController');
Route::get('/create', 'OrdersController@showUserRegistration');
Route::post('/create', 'OrdersController@saveUser');

Route::resource('notes', 'NotesController');
Route::resource('user', 'UserController');
Route::resource('invoices', 'InvoicesController');
Route::resource('permissions', 'PermissionsController');

Route::post(
    'orders/search',
    array(
        'as' => 'orders.search',
        'uses' => 'OrdersController@postSearch'
    )
);
