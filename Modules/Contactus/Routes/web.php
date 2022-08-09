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
    Route::middleware('can:View Contactus')->get('/contactus', 'ContactusController@index')->name('contactus.index');
    Route::middleware('can:View Contactus')->get('/contactus/product-inquiry', 'ContactusController@productInquiry')->name('contactus.productInquiry');
    // Route::middleware('can:View Contactus')->get('/contactus/create', 'ContactusController@create')->name('contactus.create');
    Route::middleware('can:View Contactus')->get('/contactus/service-inquiry', 'ContactusController@serviceInquiry')->name('contactus.serviceInquiry');
    // Route::middleware('can:View Contactus')->get('/contactus/show', 'ContactusController@show')->name('contactus.show');
    Route::middleware('can:View Contactus')->get('/subscribes-list', 'ContactusController@subscribe')->name('subscribe');

    Route::middleware('can:Add Contactus')->post('/contactus/create', 'ContactusController@store')->name('contactus.store');
    Route::middleware('can:Edit Contactus')->get('/contactus/{id}', 'ContactusController@edit')->name('contactus.edit');
    Route::middleware('can:Edit Contactus')->post('/contactus/{id}', 'ContactusController@update')->name('contactus.update');
    Route::middleware('can:Delete Contactus')->get('/contactus/{id}/delete', 'ContactusController@destroy')->name('contactus.delete');
    Route::middleware('can:Delete Contactus')->get('/subscribe/{id}/delete', 'ContactusController@destroySubscribe')->name('subscribe.delete');

    Route::post('product-view', 'ContactusController@viewProduct')->name('viewProduct');
    Route::post('service-view', 'ContactusController@viewService')->name('viewService');
    Route::post('contact-view', 'ContactusController@viewContact')->name('viewContact');

});