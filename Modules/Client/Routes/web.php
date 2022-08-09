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

Route::prefix('admin')->group(function () {
    Route::middleware('can:View Client')->get('/client', 'ClientController@index')->name('client.index');
    Route::middleware('can:Add Client')->get('/client/create', 'ClientController@create')->name('client.create');
    Route::middleware('can:Add Client')->post('/client/create', 'ClientController@store')->name('client.store');
    Route::middleware('can:Edit Client')->get('/client/{id}', 'ClientController@edit')->name('client.edit');
    Route::middleware('can:Edit Client')->post('/client/{id}', 'ClientController@update')->name('client.update');
    Route::middleware('can:Delete Client')->get('/client/{id}/delete', 'ClientController@destroy')->name('client.delete');
});