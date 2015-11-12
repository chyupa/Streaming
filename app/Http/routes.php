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

Route::get('auth', function(){
   return redirect()->route('auth.get.login');
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('login', ['as' => 'auth.get.login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('login', ['as' => 'auth.post.login', 'uses' => 'Auth\AuthController@postLogin']);

    Route::get('studio/register', ['as' => 'auth.get.studio.register', 'uses' => 'Auth\AuthController@getStudioRegister']);
    Route::post('studio/register', ['as' => 'auth.post.studio.register', 'uses' => 'Auth\AuthController@postStudioRegister']);

    Route::get('user/register', ['as' => 'auth.get.user.register', 'uses' => 'Auth\AuthController@getUserRegister']);
    Route::post('user/register', ['as' => 'auth.post.user.register', 'uses' => 'Auth\AuthController@postUserRegister']);

    Route::get('logout', ['as' => 'auth.get.logout', 'uses' => 'Auth\AuthController@getLogout']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Dashboard'], function(){
    Route::get('/', ['as' => 'get.admin.dashboard', 'uses' => 'AdminController@showDashboard']);

    Route::get('users', ['as' => 'admin.show.users', 'uses' => 'AdminController@showUsers']);
    Route::get('studios', ['as' => 'admin.show.studios', 'uses' => 'AdminController@showStudios']);
    Route::get('categories', ['as' => 'admin.show.categories', 'uses' => 'AdminController@showCategories']);
});