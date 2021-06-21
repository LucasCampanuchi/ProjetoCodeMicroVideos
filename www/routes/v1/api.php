<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->name('user')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categories', 'CategoryController')->except(['create', 'edit']);
Route::resource('genres', 'GenresController')->except(['create', 'edit']);
Route::resource('movies', 'MoviesController')->except(['create', 'edit']);
Route::resource('castmember', 'CastMemberController')->except(['create', 'edit']);

