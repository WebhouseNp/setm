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
    Route::middleware('can:View News')->get('/news', 'NewsController@index')->name('news.index');
    Route::middleware('can:Add News')->get('/news/create', 'NewsController@create')->name('news.create');
    Route::middleware('can:Add News')->post('/news/create', 'NewsController@store')->name('news.store');
    Route::middleware('can:Edit News')->get('/news/{id}', 'NewsController@edit')->name('news.edit');
    Route::middleware('can:Edit News')->post('/news/{id}', 'NewsController@update')->name('news.update');
    Route::middleware('can:Delete News')->get('/news/{id}/delete', 'NewsController@destroy')->name('news.delete');
});
