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
    Route::middleware('can:View Service')->get('/service', 'ServiceController@index')->name('service.index');
    Route::middleware('can:Add Service')->get('/service/create', 'ServiceController@create')->name('service.create');
    Route::middleware('can:Add Service')->post('/service/create', 'ServiceController@store')->name('service.store');
    Route::middleware('can:Edit Service')->get('/service/{id}', 'ServiceController@edit')->name('service.edit');
    Route::middleware('can:Edit Service')->post('/service/{id}', 'ServiceController@update')->name('service.update');
    Route::middleware('can:Delete Service')->get('/service/{id}/delete', 'ServiceController@destroy')->name('service.delete');
});
Route::middleware('can:View Service')->post('/service/updateorder', 'ServiceController@updateOrder')->name('service.update.order');
