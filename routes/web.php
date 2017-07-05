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



/* |--------------------------------------------------------------------------
| PANNELLO ADMIN
|-------------------------------------------------------------------------- */

Route::group(['domain' => 'admin.gliamicidirobi'], function () {

    Auth::routes();

    Route::get('/', 'HomeController@index')->name('index');
    Route::get('utenti', ['uses' => 'UtentiController@index', 'as' => 'admin.utenti']);
    Route::get('profilo', ['uses' => 'UtentiController@profilo', 'as' => 'admin.profilo']);
    Route::get('festival', ['uses' => 'FestivalController@index', 'as' => 'admin.festival']);

    Route::post('upload', ['uses' => 'FestivalController@UpdateImg', 'as' => 'admin.festival']);




});


/* |--------------------------------------------------------------------------
| TORNEO
|-------------------------------------------------------------------------- */

Route::group(['domain' => 'classicstreetballmemorialrobitelli.gliamicidirobi'], function () {

    Route::get('/', function () {
        return view('torneo.index');
    });
});

/* |--------------------------------------------------------------------------
| FESTIVAL
|-------------------------------------------------------------------------- */

Route::group(['domain' => 'tantarobbafreemusicfestival.gliamicidirobi'], function () {

    Route::get('/', function () {
            return view('festival.index');
    });
});

/* |--------------------------------------------------------------------------
| TRK
|-------------------------------------------------------------------------- */

Route::group(['domain' => 'tantarobbakids.gliamicidirobi'], function () {

    Route::get('/', function () {
        return view('trk.index');
    });
});

/* |--------------------------------------------------------------------------
| ASSOCIAZIONE
|-------------------------------------------------------------------------- */

Route::group(['domain' => 'gliamicidirobi'], function () {

    Route::get('/', function () {
        return view('associazione.index');
    });
});
