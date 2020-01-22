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

Route::resource('unidades/productivas','UnidadProductivaController');
Route::get('unidad/productiva/create','UnidadProductivaController@create');
Route::get('unidad/productiva/edit/{id}','UnidadProductivaController@edit');

Route::resource('costos','CostosController');
Route::get('costo/create','CostosController@create');
Route::get('costo/edit/{id}','CostosController@edit');


Route::resource('sectores','SectorController');
Route::get('sector/create','SectorController@create');
Route::get('sector/edit/{id}','SectorController@edit');

Route::resource('lote/unidad_productiva','LoteUnidadProductivaController');


Route::resource('lotes','LoteController');



Route::get( '/', 'Controller@home' )->name( 'home' );
