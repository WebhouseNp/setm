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
    Route::middleware('can:View Team')->get('/team', 'TeamController@index')->name('team.index');
    Route::middleware('can:Add Team')->get('/team/create', 'TeamController@create')->name('team.create');
    Route::middleware('can:Add Team')->post('/team/create', 'TeamController@store')->name('team.store');
    Route::middleware('can:Edit Team')->get('/team/{id}', 'TeamController@edit')->name('team.edit');
    Route::middleware('can:Edit Team')->post('/team/{id}', 'TeamController@update')->name('team.update');
    Route::middleware('can:Delete Team')->get('/team/{id}/delete', 'TeamController@destroy')->name('team.delete');
});
Route::middleware('can:View Team')->post('/team/updateorder', 'TeamController@updateOrder')->name('team.update.order');

