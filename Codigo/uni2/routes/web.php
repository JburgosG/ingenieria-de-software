<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UsersController');

/* View */
Route::get('profile/{id}', 'UsersController@show');

/* Create Modules */
Route::get('create_user', 'UsersController@create');

Route::get('storage/{folder}/{path}', 'MainController@loadimage');
Route::post('change-avatar', ['as' => 'change-avatar', 'uses' => 'UsersController@changeAvatar']);