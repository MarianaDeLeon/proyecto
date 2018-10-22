<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mensaje', function () {
    echo "hola mundo tic74";
});



Route::get('/altacliente','sistema@altacliente');
/*
Route::POST('/guardamaestro','curso@guardamaestro')->name('guardamaestro');

Route::get('/reportemaestros','curso@reportemaestros');
Route::get('/eliminam/{idm}','curso@eliminam')->name('eliminam');
Route::get('/modificaam/{idm}','curso@modificam')->name('modificam');

Route::POST('/guardaedicionm','curso@guardaedicionm')->name('guardaedicionm');
*/











