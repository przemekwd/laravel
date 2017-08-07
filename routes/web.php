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

Route::group(['middleware' => ['menus']], function() {
    Route::get('/home', ['as' => 'homepage', function() {
        return view('home');
    }]);

    Route::resource('artist', 'ArtistController');

    Route::resource('album', 'AlbumController');

    Route::resource('distributor', 'DistributorController');
});
