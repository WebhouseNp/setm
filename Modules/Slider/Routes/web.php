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
    Route::middleware('can:View Slider')->get('/slider', 'SliderController@index')->name('slider.index');
    Route::middleware('can:Add Slider')->get('/slider/create', 'SliderController@create')->name('slider.create');
    Route::middleware('can:Add Slider')->post('/slider/create', 'SliderController@store')->name('slider.store');
    Route::middleware('can:Edit Slider')->get('/slider/{id}', 'SliderController@edit')->name('slider.edit');
    Route::middleware('can:Edit Slider')->post('/slider/{id}', 'SliderController@update')->name('slider.update');
    Route::middleware('can:Delete Slider')->get('/slider/{id}/delete', 'SliderController@destroy')->name('slider.delete');
});
