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

// Route::prefix('role')->group(function() {
//     Route::get('/', 'RoleController@index');
// });
Route::group([], function () {
    Route::middleware('can: View Role')->get('/role', 'RoleController@index')->name('role.index');
    Route::middleware('can: Add Role')->get('/role/create', 'RoleController@create')->name('role.create');
    Route::middleware('can: Add Role')->post('/role/create', 'RoleController@store')->name('role.store');
    Route::middleware('can: Edit Role')->get('/role/{id}', 'RoleController@edit')->name('role.edit');
    Route::middleware('can: Edit Role')->post('/role/{id}', 'RoleController@update')->name('role.update');
    Route::middleware('can: Delete Role')->get('/role/{id}/delete', 'RoleController@destroy')->name('role.delete');
});
