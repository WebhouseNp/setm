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

// Route::prefix('quicklink')->group(function() {
//     Route::get('/', 'QuicklinkController@index');
// });


Route::prefix('admin')->group(function () {
    Route::middleware('can:View Quicklink')->get('/quicklink', 'QuicklinkController@index')->name('quicklink.index');
    Route::middleware('can:Add Quicklink')->get('/quicklink/create', 'QuicklinkController@create')->name('quicklink.create');
    Route::middleware('can:Add Quicklink')->post('/quicklink/create', 'QuicklinkController@store')->name('quicklink.store');
    Route::middleware('can:Edit Quicklink')->get('/quicklink/{id}', 'QuicklinkController@edit')->name('quicklink.edit');
    Route::middleware('can:Edit Quicklink')->post('/quicklink/{id}', 'QuicklinkController@update')->name('quicklink.update');
    Route::middleware('can:Delete Quicklink')->get('/quicklink/{id}/delete', 'QuicklinkController@destroy')->name('quicklink.delete');
});
Route::middleware('can:View Quicklink')->post('/quicklink/updateorder', 'QuicklinkController@updateOrder')->name('quicklink.update.order');
