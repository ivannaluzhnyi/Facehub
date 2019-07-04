<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', function() {
    return Post::all();
});

Route::get('posts/{id}', function($id) {
    return Post::find($id);
});

Route::get('categories', function() {
    return Category::all();
});
Route::get('category/{id}', function($id) {
    return Category::find($id);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'Auth\LoginController@login');
});
