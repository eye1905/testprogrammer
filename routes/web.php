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

/*Route Dashboard*/
Route::get('/', 'User@index');

/*Route User*/
Route::get('/User', 'User@index');
Route::post('/User/store', 'User@store');
Route::get('/User/edit/{id}', 'User@edit');
Route::get('/User/destroy/{id}', 'User@destroy');
Route::post('/User/update', 'User@update');


/*Route Master Kota*/
Route::get('/Kota', 'Kota@index');
Route::post('/Kota/store', 'Kota@store');
Route::get('/Kota/edit/{id}', 'Kota@edit');
Route::get('/Kota/destroy/{id}', 'Kota@destroy');
Route::post('/Kota/update', 'Kota@update');
Route::post('/Kota/filter', 'Kota@filter');

/*Route Master Provinsi*/
Route::get('/Provinsi', 'Provinsi@index');
Route::post('/Provinsi/store', 'Provinsi@store');
Route::get('/Provinsi/edit/{id}', 'Provinsi@edit');
Route::get('/Provinsi/destroy/{id}', 'Provinsi@destroy');
Route::post('/Provinsi/update', 'Provinsi@update');