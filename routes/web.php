<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
        Route::get('users', ['as' => 'users.all-users', 'uses' => 'App\Http\Controllers\UserController@allUsers']);
        Route::get('user/show/{id}', ['as' => 'users.show', 'uses' => 'App\Http\Controllers\UserController@show']);
        Route::delete('user/delete/{id}',  [ 'as' => 'user.delete', 'uses' => '\App\Http\Controllers\UserController@delete']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('posts', ['as' => 'posts.index', 'uses' => 'App\Http\Controllers\PostController@index']);
    Route::get('post/create', ['as' => 'posts.create', 'uses' => 'App\Http\Controllers\PostController@create']);
    Route::post('post/create', ['as' => 'posts.store', 'uses' => 'App\Http\Controllers\PostController@store']);
    Route::get('post/edit/{id}', ['as' => 'posts.edit', 'uses' => 'App\Http\Controllers\PostController@edit']);
    Route::get('post/show/{id}', ['as' => 'posts.show', 'uses' => 'App\Http\Controllers\PostController@show']);
    Route::put('post/update/{id}', ['as' => 'posts.update', 'uses' => 'App\Http\Controllers\PostController@update']);
    Route::delete('post/delete/{id}', ['as' => 'posts.delete', 'uses' => 'App\Http\Controllers\PostController@delete']);
});
