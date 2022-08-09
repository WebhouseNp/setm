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
    Route::get('/site', 'SiteController@index')->name('site.index');
    Route::post('/site/{id}', 'SiteController@update')->name('site.update');
    Route::post('/openingHour', 'SiteController@saveOpeningHour')->name('site.openingHour');
    Route::post('/about', 'SiteController@about')->name('site.about');
    Route::post('/mission', 'SiteController@missionVision')->name('site.mission');
});
