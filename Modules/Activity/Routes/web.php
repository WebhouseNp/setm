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

// Route::prefix('activity')->group(function() {
//     Route::get('/', 'ActivityController@index');
// });

Route::prefix('admin')->group(function () {
    Route::middleware('can:View Activity')->get('/activity', 'ActivityController@index')->name('activity.index');
    Route::middleware('can:Add Activity')->get('/activity/create', 'ActivityController@create')->name('activity.create');
    Route::middleware('can:Add Activity')->post('/activity/create', 'ActivityController@store')->name('activity.store');
    Route::middleware('can:Edit Activity')->get('/activity/{id}', 'ActivityController@edit')->name('activity.edit');
    Route::middleware('can:Edit Activity')->post('/activity/{id}', 'ActivityController@update')->name('activity.update');
    Route::middleware('can:Delete Activity')->get('/activity/{id}/delete', 'ActivityController@destroy')->name('activity.delete');
});
