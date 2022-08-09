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
    Route::middleware('can:View User')->get('/user', 'UserController@index')->name('user.index');
    Route::middleware('can:Add User')->get('/user/create', 'UserController@create')->name('user.create');
    Route::middleware('can:Add User')->post('/user/create', 'UserController@store')->name('user.store');
    Route::middleware('can:Edit User')->get('/user/{id}', 'UserController@edit')->name('user.edit');
    Route::middleware('can:Edit User')->post('/user/{id}', 'UserController@update')->name('user.update');
    Route::middleware('can:Delete User')->get('/user/{id}/delete', 'UserController@destroy')->name('user.delete');
});
