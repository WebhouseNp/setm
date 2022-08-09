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
    Route::middleware('can:View Blog')->get('/blog', 'BlogController@index')->name('blog.index');
    Route::middleware('can:Add Blog')->get('/blog/create', 'BlogController@create')->name('blog.create');
    Route::middleware('can:Add Blog')->post('/blog/create', 'BlogController@store')->name('blog.store');
    Route::middleware('can:Edit Blog')->get('/blog/{id}', 'BlogController@edit')->name('blog.edit');
    Route::middleware('can:Edit Blog')->post('/blog/{id}', 'BlogController@update')->name('blog.update');
    Route::middleware('can:Delete Blog')->get('/blog/{id}/delete', 'BlogController@destroy')->name('blog.delete');
});
Route::middleware('can:View Blog')->post('/blog/updateorder', 'BlogController@updateOrder')->name('blog.update.order');
