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
    Route::middleware('can:View Testimonial')->get('/testimonial', 'TestimonialController@index')->name('testimonial.index');
    Route::middleware('can:Add Testimonial')->get('/testimonial/create', 'TestimonialController@create')->name('testimonial.create');
    Route::middleware('can:Add Testimonial')->post('/testimonial/create', 'TestimonialController@store')->name('testimonial.store');
    Route::middleware('can:Edit Testimonial')->get('/testimonial/{id}', 'TestimonialController@edit')->name('testimonial.edit');
    Route::middleware('can:Edit Testimonial')->post('/testimonial/{id}', 'TestimonialController@update')->name('testimonial.update');
    Route::middleware('can:Delete Testimonial')->get('/testimonial/{id}/delete', 'TestimonialController@destroy')->name('testimonial.delete');
});
Route::middleware('can:View Testimonial')->post('/testimonial/updateorder', 'TestimonialController@updateOrder')->name('testimonial.update.order');

