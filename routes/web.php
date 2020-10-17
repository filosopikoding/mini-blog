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

#halaman posts.
Route::get('posts', 'PostController@index');

#halaman detail posts
Route::get('posts/{slug}', 'PostController@show');
Route::post('posts/comment/{slug}', 'PostController@comment');
