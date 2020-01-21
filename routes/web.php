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


Auth::routes(  );

Route::resource('unidad/productiva','UnidadProductivaController');


Route::resource('costos','CostosController');
Route::get('costo/create','CostosController@create');
Route::get('costo/edit/{id}','CostosController@edit');


Route::resource('sectores','SectorController');


Route::resource('lote/unidad_productiva','LoteUnidadProductivaController');


Route::resource('lotes','LoteController');



Route::get( '/', 'Controller@home' )->name( 'home' );
