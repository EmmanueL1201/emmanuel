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


Route::get('/', 'principalController@login')->name('login');
Route::get('/inicio', 'principalController@inicio')->name('inicio');
Route::get('/buscador', 'principalController@index')->name('buscador');
Route::get('/login', 'principalController@login');
Route::POST('/valida', 'principalController@valida')->name('valida'); 
Route::get('/registrate', 'principalController@registrate')->name('registrate');
Route::POST('/guardaregistro', 'principalController@guardaregistro')->name('guardaregistro');
Route::get('/logout','principalController@logout')->name('logout');
Route::get('/visitas', 'VisitasController@visitas')->name('visitas');
Route::post('/actualizarVisitas', 'VisitasController@actualizarVisitas')->name('actualizarVisitas');