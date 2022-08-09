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

// Route::prefix('whatwedo')->group(function() {
//     Route::get('/', 'WhatwedoController@index');
// });

Route::prefix('admin')->group(function () {
    Route::middleware('can:View Whatwedo')->get('/whatwedo', 'WhatwedoController@index')->name('whatwedo.index');
    Route::middleware('can:Add Whatwedo')->get('/whatwedo/create', 'WhatwedoController@create')->name('whatwedo.create');
    Route::middleware('can:Add Whatwedo')->post('/whatwedo/create', 'WhatwedoController@store')->name('whatwedo.store');
    Route::middleware('can:Edit Whatwedo')->get('/whatwedo/{id}', 'WhatwedoController@edit')->name('whatwedo.edit');
    Route::middleware('can:Edit Whatwedo')->post('/whatwedo/{id}', 'WhatwedoController@update')->name('whatwedo.update');
    Route::middleware('can:Delete Whatwedo')->get('/whatwedo/{id}/delete', 'WhatwedoController@destroy')->name('whatwedo.delete');
});