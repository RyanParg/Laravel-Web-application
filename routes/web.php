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

Route::get('/comments', 'CommentController@page');

Route::post('profile', 'ProfileController@store')->name('profile.store')->middleware('auth');


Route::get('blogs', 'BlogController@index')->name('blogs.index')->middleware('auth');
Route::get('blogs/create', 'BlogController@create')->name('blogs.create')->middleware('auth');
Route::post('blogs', 'BlogController@store')->name('blogs.store')->middleware('auth');
Route::post('blogs/{user}/{page}', 'BlogController@storeUpdate')->name('blogs.storeUpdate')->middleware('check_admin');
Route::get('blogs/{user}', 'BlogController@show')->name('blogs.show')->middleware('auth');
Route::get('blogs/{user}/{page}', 'BlogController@showUserPosts')->name('blogs.show_user_posts')->middleware('auth');
Route::get('{user}/blogs/{page}/update', 'BlogController@update')->name('blogs.update')->middleware('check_admin');
Route::get('{user}/edit/blogs', 'BlogController@edit')->name('blogs.edit')->middleware('check_admin');
Route::delete('blogs/{user}/{page}', 'BlogController@destroy')->name('blogs.destroy')->middleware('check_admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
