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

Route::get('/', function () {
    return view('welcome');
});


Route::get('blogs', 'BlogController@index')->name('blogs.index');

Route::get('blogs/create', 'BlogController@create')->name('blogs.create');

Route::post('blogs', 'BlogController@store')->name('blogs.store');

Route::get('blogs/{user}', 'BlogController@show')->name('blogs.show');

Route::get('blogs/{user}/{page}', 'BlogController@showUserPosts')->name('blogs.show_user_posts');

Route::delete('blogs/{id}', 'BlogController@destroy')->name('blogs.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
