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


//rupas del catalogo cliente
Route::get('/altacliente','sistema@altacliente');
Route::POST('/guardacliente','sistema@guardacliente')->name('guardacliente');
Route::get('/reportecliente','sistema@reportecliente');
//rutas del catalogo usuarios
Route::get('/altausuario','sistema@altausuario');
Route::POST('/guardausuario','sistema@guardausuario')->name('guardausuario');
Route::get('/reporteusu','sistema@reporteusu');
/*
Route::get('/eliminam/{idm}','sistema@eliminam')->name('eliminam');
Route::get('/modificaam/{idm}','sistema@modificam')->name('modificam');

Route::POST('/guardaedicionm','sistema@guardaedicionm')->name('guardaedicionm');

*/
