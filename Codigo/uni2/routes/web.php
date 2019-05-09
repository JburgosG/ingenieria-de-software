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
Route::resource('subject', 'SubjectsController');
Route::resource('activity', 'ActivitiesController');

/* Modules */
Route::get('subjects', 'SubjectsController@index');

/* View */
Route::get('profile/{id}', 'UsersController@show');
Route::get('view_subject/{id}', 'SubjectsController@show');

/* Create Modules */
Route::get('create_user', 'UsersController@create');
Route::get('create_subject', 'SubjectsController@create');

Route::get('storage/{folder}/{path}', 'MainController@loadimage');
Route::post('/exists', ['as' => 'exists', 'uses' => 'MainController@exists']);
Route::post('upload', ['as' => 'upload', 'uses' => 'SubjectsController@upload']);
Route::post('schedule', ['as' => 'schedule', 'uses' => 'SubjectsController@schedule']);
Route::post('change-pass', ['as' => 'change-pass', 'uses' => 'UsersController@changePassword']);
Route::post('change-avatar', ['as' => 'change-avatar', 'uses' => 'UsersController@changeAvatar']);