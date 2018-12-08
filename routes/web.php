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

Route::get('/', 'TuduController@index');

Route::post('/create', 'TuduController@create');

Route::put('/update/{id}', 'TuduController@update');

Route::put('/edit/{id}', 'TuduController@edit');

Route::delete('/delete/{id}', 'TuduController@delete');