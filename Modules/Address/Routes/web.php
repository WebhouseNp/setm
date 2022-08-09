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
    Route::middleware('can:View Address')->get('/address', 'AddressController@index')->name('address.index');
    Route::middleware('can:Add Address')->get('/address/create', 'AddressController@create')->name('address.create');
    Route::middleware('can:Add Address')->post('/address/create', 'AddressController@store')->name('address.store');
    Route::middleware('can:Edit Address')->get('/address/{id}', 'AddressController@edit')->name('address.edit');
    Route::middleware('can:Edit Address')->post('/address/{id}', 'AddressController@update')->name('address.update');
    Route::middleware('can:Delete Address')->get('/address/{id}/delete', 'AddressController@destroy')->name('address.delete');
});
Route::middleware('can:View Address')->post('/address/updateorder', 'AddressController@updateOrder')->name('address.update.order');
