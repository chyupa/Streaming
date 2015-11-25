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

Route::get('auth', function () {
  return redirect()->route('auth.get.login');
});

Route::group(['prefix' => 'auth'], function () {
  Route::get('login', ['as' => 'auth.get.login', 'uses' => 'Auth\AuthController@getLogin']);
  Route::post('login', ['as' => 'auth.post.login', 'uses' => 'Auth\AuthController@postLogin']);

  Route::get('studio/register', ['as' => 'auth.get.studio.register', 'uses' => 'Auth\AuthController@getStudioRegister']);
  Route::post('studio/register', ['as' => 'auth.post.studio.register', 'uses' => 'Auth\AuthController@postStudioRegister']);

  Route::get('user/register', ['as' => 'auth.get.user.register', 'uses' => 'Auth\AuthController@getUserRegister']);
  Route::post('user/register', ['as' => 'auth.post.user.register', 'uses' => 'Auth\AuthController@postUserRegister']);

  Route::get('logout', ['as' => 'auth.get.logout', 'uses' => 'Auth\AuthController@getLogout']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Dashboard'], function () {
  Route::get('/', ['as' => 'admin.show.dashboard', 'uses' => 'AdminController@showDashboard']);

  Route::get('users', ['as' => 'admin.show.users', 'uses' => 'AdminController@showUsers']);
  Route::get('studios', ['as' => 'admin.show.studios', 'uses' => 'AdminController@showStudios']);
  Route::get('categories', ['as' => 'admin.show.categories', 'uses' => 'AdminController@showCategories']);

  Route::group(['prefix', 'user'], function () {
    Route::get('edit/{user}', ['as' => 'admin.get.user.edit', 'uses' => 'UserController@getEditUser']);
    Route::post('edit/{user}', ['as' => 'admin.post.user.edit', 'uses' => 'UserController@postEditUser']);
  });

  Route::group(['prefix' => 'studio'], function () {
    Route::get('edit/{user}', ['as' => 'admin.get.studio.edit', 'uses' => 'StudioController@getEditStudio']);
    Route::post('edit/{user}', ['as' => 'admin.post.studio.edit', 'uses' => 'StudioController@postEditStudio']);
    Route::get('upload/{user}', ['as' => 'admin.get.video.upload', 'uses' => 'StudioController@getEditStudioVideo']);
    Route::post('upload/{user}', ['as' => 'admin.post.video.upload', 'uses' => 'StudioController@postEditStudioVideo']);
    Route::get('videos/{user}', ['as' => 'admin.get.studio.videos', 'uses' => 'StudioController@getStudioVideos']);
    Route::get('{user}/video/edit/{video}', ['as' => 'admin.get.video.edit', 'uses' => 'VideoController@getEditVideo']);

  });

  Route::group(['prefix' => 'category'], function () {
    Route::get('add', ['as' => 'admin.get.category.add', 'uses' => 'VideoCategoryController@getAddCategory']);
    Route::post('add', ['as' => 'admin.post.category.add', 'uses' => 'VideoCategoryController@postAddCategory']);
    Route::get('edit/{category}', ['as' => 'admin.get.category.edit', 'uses' => 'VideoCategoryController@getEditCategory']);
    Route::post('edit/{category}', ['as' => 'admin.post.category.edit', 'uses' => 'VideoCategoryController@postEditCategory']);
    Route::get('related/{category}', ['as' => 'admin.get.category.related', 'uses' => 'VideoCategoryController@getRelatedCategories']);
    Route::post('related/{category}', ['as' => 'admin.post.category.related', 'uses' => 'VideoCategoryController@postRelatedCategories']);
  });
});