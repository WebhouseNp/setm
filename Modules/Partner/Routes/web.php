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
    Route::middleware('can:View Partner')->get('/partner', 'PartnerController@index')->name('partner.index');
    Route::middleware('can:Add Partner')->get('/partner/create', 'PartnerController@create')->name('partner.create');
    Route::middleware('can:Add Partner')->post('/partner/create', 'PartnerController@store')->name('partner.store');
    Route::middleware('can:Edit Partner')->get('/partner/{id}', 'PartnerController@edit')->name('partner.edit');
    Route::middleware('can:Edit Partner')->post('/partner/{id}', 'PartnerController@update')->name('partner.update');
    Route::middleware('can:Delete Partner')->get('/partner/{id}/delete', 'PartnerController@destroy')->name('partner.delete');
});
Route::middleware('can:View Partner')->post('/partner/updateorder', 'PartnerController@updateOrder')->name('partner.update.order');
