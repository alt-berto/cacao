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
Route::get('unidad/productiva/active','UnidadProductivaController@active');
Route::get('unidad/productiva/create','UnidadProductivaController@create');
Route::get('unidad/productiva/edit/{id}','UnidadProductivaController@edit');

Route::resource('etapas','EtapaController');
Route::get('etapa/active','EtapaController@active');
Route::get('etapa/create','EtapaController@create');
Route::get('etapa/edit/{id}','EtapaController@edit');

Route::resource('costos','CostosController');
Route::get('costo/create','CostosController@create');
Route::get('costo/edit/{id}','CostosController@edit');

Route::resource('costo/periodos','CostosPeriodosController');
Route::get('costo/periodo/create','CostosPeriodosController@create');
Route::get('costo/periodo/edit/{id}','CostosPeriodosController@edit');

Route::resource('types','TypeController');
Route::get('type/create','TypeController@create');
Route::get('type/edit/{id}','TypeController@edit');


Route::resource('sectores','SectorController');
Route::get('sector/active','SectorController@active');
Route::get('sector/create','SectorController@create');
Route::get('sector/edit/{id}','SectorController@edit');

Route::resource('lotes/unidad_productiva','LoteUnidadProductivaController');
Route::get('lote/unidad_productiva/create','LoteUnidadProductivaController@create');
Route::get('lote/unidad_productiva/edit/{id}','LoteUnidadProductivaController@edit');

Route::resource('lotes','LoteController');
Route::get('lote/active','LoteController@active');
Route::get('lote/create','LoteController@create');
Route::get('lote/edit/{id}','LoteController@edit');


Route::get( '/', 'Controller@home' )->name( 'home' );
