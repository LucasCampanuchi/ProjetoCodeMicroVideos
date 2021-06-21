<?php

use App\Models\Category;
use App\Models\CastMember;
use App\Models\Movies;
use App\Models\Genres;
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

Route::get('/genres/{id}', function ($id) {
    return view('genre')->with(['id' => $id]);
});

Route::get('/movies/{id}', function ($id) {
    return view('movies')->with(['id' => $id]);
});

Route::get('/castmember/{id}', function ($id) {
    return view('castmember')->with(['id' => $id]);
});

Route::get('/categories/{category}', function ($category) {
    return view('categorias')->with(['category' => $category]);
});

