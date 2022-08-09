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
    Route::middleware('can:View Career')->get('/career', 'CareerController@index')->name('career.index');
    Route::middleware('can:Add Career')->get('/career/create', 'CareerController@create')->name('career.create');
    Route::middleware('can:Add Career')->post('/career/create', 'CareerController@store')->name('career.store');
    Route::middleware('can:Edit Career')->get('/career/{id}', 'CareerController@edit')->name('career.edit');
    Route::middleware('can:Edit Career')->post('/career/{id}', 'CareerController@update')->name('career.update');
    Route::middleware('can:Delete Career')->get('/career/{id}/delete', 'CareerController@destroy')->name('career.delete');
});
