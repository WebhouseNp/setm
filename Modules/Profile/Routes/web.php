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

// Route::prefix('profile')->group(function() {
//     Route::get('/', 'ProfileController@index');
// });

Route::get('/changepassword', 'ProfileController@changepassword')->name('changepassword');

Route::post('/changepassword', 'ProfileController@updatePassword')->name('changepassword');
