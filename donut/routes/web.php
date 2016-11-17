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


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/create_chat', 'DemoController@createChat');
Route::get('/chat/{chat}', 'DemoController@chat');
Route::get('/getmessage/{chat}', 'DemoController@getmessage');
Route::get('/sentmessage/{chat}', 'DemoController@sentmessage');