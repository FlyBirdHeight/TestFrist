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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::any('admin/login', 'Admin\UserController@login');
    Route::get('admin/code', 'Admin\UserController@code');

    Route::any('admin/denglu', 'Admin\LoginController@login');

    Route::any('admin/index','Admin\IndexController@index');
    Route::get('admin/zhuche','Admin\IndexController@create');
    Route::post('admin/add','Admin\IndexController@add');
    
    Route::any('admin/Communication','Admin\CommunicationController@index');
    
    Route::get('admin/visitor/{art_id}','Admin\VisitorController@index');
    Route::any('admin/inter/{art_id}','Admin\VisitorController@inter');
    
});

Route::group(['middleware' => ['web','admin.denglu']], function () {
    Route::get('admin/personinformation','Admin\IndexController@edit');
    Route::get('admin/quit','Admin\IndexController@quit');
    Route::any('admin/edituser','Admin\IndexController@store');
    
    Route::resource('admin/useradd','Admin\UseraddController');
});

Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {

    Route::get('index1', 'AdminController@index');
    Route::get('info', 'AdminController@info');
    Route::get('quit1', 'UserController@quit1');
    Route::any('pass','AdminController@pass');

    Route::post('cate/changeorder', 'CategoryController@changeOrder');
    Route::resource('category','CategoryController');

    Route::resource('article','ArticleController');
    Route::any('upload','CommentController@upload');
});
