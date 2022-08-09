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
    Route::middleware('can:View Incident')->get('/incident', 'IncidentController@index')->name('incident.index');
    Route::middleware('can:Add Incident')->get('/incident/create', 'IncidentController@create')->name('incident.create');
    Route::middleware('can:Add Incident')->post('/incident/create', 'IncidentController@store')->name('incident.store');
    Route::middleware('can:Edit Incident')->get('/incident/{id}', 'IncidentController@edit')->name('incident.edit');
    Route::middleware('can:Edit Incident')->post('/incident/{id}', 'IncidentController@update')->name('incident.update');
    Route::middleware('can:Delete Incident')->get('/incident/{id}/delete', 'IncidentController@destroy')->name('incident.delete');
    Route::post('incident-view', 'IncidentController@viewIncident')->name('viewIncident');
});