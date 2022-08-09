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
    Route::middleware('can:View Associated')->get('/department', 'DepartmentController@index')->name('department.index');
    Route::middleware('can:Add Associated')->get('/department/create', 'DepartmentController@create')->name('department.create');
    Route::middleware('can:Add Associated')->post('/department/create', 'DepartmentController@store')->name('department.store');
    Route::middleware('can:Edit Associated')->get('/department/{id}', 'DepartmentController@edit')->name('department.edit');
    Route::middleware('can:Edit Associated')->post('/department/{id}', 'DepartmentController@update')->name('department.update');
    Route::middleware('can:Delete Associated')->get('/department/{id}/delete', 'DepartmentController@destroy')->name('department.delete');
});
Route::middleware('can:View Department')->post('/department/updateorder', 'DepartmentController@updateOrder')->name('department.update.order');

