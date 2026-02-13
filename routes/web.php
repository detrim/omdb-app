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

Route::get('/', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth.custom'], function () {

    Route::get('/movies', 'MovieController@index')->name('movies');
    Route::get('/movies/search', 'MovieController@search');
    Route::get('/movies/{id}', 'MovieController@detail');

    Route::get('/favorite', 'FavoriteController@index')->name('favorite');
    Route::post('/favorite/add', 'FavoriteController@add');
    Route::post('/favorite/remove', 'FavoriteController@remove');
    Route::get('/lang/{lang}', function($lang){
        session(['lang'=>$lang]);
        return back();
    });

    });



