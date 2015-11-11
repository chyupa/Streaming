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

    Route::get('register', ['as' => 'auth.get.register', 'uses' => 'Auth\AuthController@getRegister']);
    Route::post('register', ['as' => 'auth.post.register', 'uses' => 'Auth\AuthController@postRegister']);

    Route::get('logout', ['as' => 'auth.get.logout', 'uses' => 'Auth\AuthController@getLogout']);
});