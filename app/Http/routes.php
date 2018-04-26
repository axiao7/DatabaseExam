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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['check.login']], function () {

    Route::get('/', ['uses' => 'AdminController@index']);

    Route::get('studentinfo', ['uses' => 'AdminController@student']);

    Route::any('login', ['uses' => 'AdminController@login']);

//    Route::post('login', ['uses' => 'AdminController@login']);

});
