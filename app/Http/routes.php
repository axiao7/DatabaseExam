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

Route::group(['prefix' => 'teacher', 'namespace' => 'Teacher', 'middleware' => ['checkTea']], function () {

    Route::get('/', ['uses' => 'TeacherController@index']);
//
//    Route::get('studentinfo', ['uses' => 'TeacherController@student']);
//
//    Route::get('teacherinfo', ['uses' => 'TeacherController@teacher']);
//
//    Route::any('login', ['uses' => 'TeacherController@login']);
//
//    Route::any('upload/{id}', ['uses' => 'TeacherController@excelImport']);
//
//    Route::get('excel/export','TeacherController@export');

//    Route::post('login', ['uses' => 'AdminController@login']);

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['check.login']], function () {

    Route::get('/', ['uses' => 'AdminController@index']);

    Route::get('studentinfo', ['uses' => 'AdminController@student']);

    Route::get('teacherinfo', ['uses' => 'AdminController@teacher']);

    Route::any('login', ['uses' => 'AdminController@login']);

    Route::any('upload/{id}', ['uses' => 'AdminController@excelImport']);

    Route::get('excel/export','AdminController@export');

//    Route::post('login', ['uses' => 'AdminController@login']);

});
