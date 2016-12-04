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


Route::get('/', 'FollowController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/create_chat/{user_id}', 'DemoController@createChat');
Route::get('/chat/{chat}', 'DemoController@chat');
Route::get('/create_group', 'DemoController@createGroup');
Route::get('/getmessage/{chat}', 'DemoController@getmessage');
Route::get('/sentmessage/{chat}', 'DemoController@sentmessage');

//Followable
Route::get('/send_follow/{id}', 'FollowController@sendFollow');
Route::get('/unfollow/{id}', 'FollowController@unfollow');
