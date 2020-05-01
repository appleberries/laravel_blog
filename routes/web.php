<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@index');

Route::group(['prefix' => 'pages'], function(){
	Route::get('/services', 'PagesController@services');
	Route::get('/about', 'PagesController@about');
});

Route::group(['prefix' => 'posts'], function(){
	Route::get('/create_post', 'PostsController@createPost');
	Route::post('/store_post', 'PostsController@storePost');
	Route::get('/index_post', 'PostsController@indexPost');
	Route::get('/show_post/{id}', 'PostsController@showPost');
	Route::get('/edit_post/{id}', 'PostsController@editPost');
	Route::patch('/update_post/{id}', 'PostsController@updatePost');
	Route::delete('/delete_post/{id}', 'PostsController@deletePost');
});

Route::group(['prefix' => 'profiles'], function(){
	Route::get('/view_profile/{user_id}', 'ProfilesController@viewProfile');
	Route::get('/edit_profile/{user_id}', 'ProfilesController@editProfile');
	Route::patch('/update_profile/{id}', 'ProfilesController@updateProfile');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
