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

Route::group(['prefix' => 'student', 'namespace' => 'Student', 'middleware' => ['checkStudent']], function () {

    Route::get('index', ['uses' => 'StudentController@index']);

    Route::any('login', ['uses' => 'StudentController@login']);

});

Route::group(['prefix' => 'teacher', 'namespace' => 'Teacher' ], function () {

    Route::get('/', ['uses' => 'TeacherController@index']);

    // 题库管理首页
    Route::get('quesbankmanager', ['uses' => 'TeacherController@bankhome']);
    // 单选题
    Route::get('quesbankmanager/choice', ['uses' => 'TeacherController@choice']);
    Route::any('quesbankmanager/choice/{id}', ['uses' => 'TeacherController@deletechoice']);
    // 判断题
    Route::get('quesbankmanager/torf', ['uses' => 'TeacherController@torf']);
    Route::any('quesbankmanager/torf/{id}', ['uses' => 'TeacherController@deletetorf']);
    // 主观题
    Route::get('quesbankmanager/subject', ['uses' => 'TeacherController@subject']);
    Route::any('quesbankmanager/subject/{id}', ['uses' => 'TeacherController@deletesubject']);
    // 题目上传
    Route::any('quesbankmanager/upload/{name}', ['uses' => 'TeacherController@excelImport']);

    // 组合试卷首页
    Route::get('createtestpaper', ['uses' => 'TeacherController@paperhome']);

    //Route::get('createtestpaper', ['uses' => 'TeacherController@']);

    // 批阅试卷
    Route::get('readpapers', ['uses' => 'TeacherController@']);

    // 成绩分析
    Route::get('scoreanalysis', ['uses' => 'TeacherController@']);
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
