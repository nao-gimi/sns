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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');
Route::post('/postcreat', 'PostsController@post');

Route::get('/profile','UsersController@profile');
Route::post('/myprofile','UsersController@myprofile');

Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

Route::delete('/delete/{id}', 'PostsController@delete');

Route::post('/update/{update}', 'PostsController@update');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/follow/{follow}', 'FollowsController@follow');
Route::get('/unfollow/{unfollow}', 'FollowsController@unfollow');

Route::get('/followlist', 'FollowsController@followlist');
Route::get('/followerlist', 'FollowsController@followerlist');

Route::get('/other/{other}', 'UsersController@other');
