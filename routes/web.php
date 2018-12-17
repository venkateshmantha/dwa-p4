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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'TuduController@index');

    Route::post('/create', 'TuduController@create');

    Route::get('/update/{id}', 'TuduController@showupdate');
    Route::put('/update/{id}', 'TuduController@update');

    Route::put('/edit/{id}', 'TuduController@edit');

    Route::delete('/delete/{id}', 'TuduController@delete');
});

Auth::routes();

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});

