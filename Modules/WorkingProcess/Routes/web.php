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
    Route::middleware('can:View WorkingProcess')->get('/workingprocess', 'WorkingProcessController@index')->name('workingprocess.index');
    Route::middleware('can:Add WorkingProcess')->get('/workingprocess/create', 'WorkingProcessController@create')->name('workingprocess.create');
    Route::middleware('can:Add WorkingProcess')->post('/workingprocess/create', 'WorkingProcessController@store')->name('workingprocess.store');
    Route::middleware('can:Edit WorkingProcess')->get('/workingprocess/{id}', 'WorkingProcessController@edit')->name('workingprocess.edit');
    Route::middleware('can:Edit WorkingProcess')->post('/workingprocess/{id}', 'WorkingProcessController@update')->name('workingprocess.update');
    Route::middleware('can:Delete WorkingProcess')->get('/workingprocess/{id}/delete', 'WorkingProcessController@destroy')->name('workingprocess.delete');
});