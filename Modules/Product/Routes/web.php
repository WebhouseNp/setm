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
    Route::middleware('can:View Product')->get('/product', 'ProductController@index')->name('product.index');
    Route::middleware('can:Add Product')->get('/product/create', 'ProductController@create')->name('product.create');
    Route::middleware('can:Add Product')->post('/product/create', 'ProductController@store')->name('product.store');
    Route::middleware('can:Edit Product')->get('/product/{id}', 'ProductController@edit')->name('product.edit');
    Route::middleware('can:Edit Product')->post('/product/{id}', 'ProductController@update')->name('product.update');
    Route::middleware('can:Delete Product')->get('/product/{id}/delete', 'ProductController@destroy')->name('product.delete');

});
Route::middleware('can:View Product')->post('/product/updateorder', 'ProductController@updateOrder')->name('product.update.order');

