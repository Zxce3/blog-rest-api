<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

// Route::resource('posts','PostController@index');
Route::get('/', 'App\Http\Controllers\PostController@hello');
Route::get('post', 'App\Http\Controllers\PostController@index');
Route::get('post/view/{id}', 'App\Http\Controllers\PostController@show');
Route::get('post/recent', 'App\Http\Controllers\PostController@recent');
Route::get('post/page', 'App\Http\Controllers\PostController@paginate');
Route::get('post/author/{id}', 'App\Http\Controllers\PostController@author');