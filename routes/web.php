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

Route::get('/hello', function () {
    return view('hello');

})->name('hello');

Route::get('/page/{param?}', function ($param = null) {
    return view('page', ['word'=>$param]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/wall', 'WallController@index')->name('wall')->middleware('auth');
Route::get('/wall/delete/{id_message}', 'WallController@delete')->middleware('auth');
Route::post('/wall/write', 'WallController@write');
