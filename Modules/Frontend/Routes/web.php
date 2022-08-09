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

Route::post('/search', 'FrontendController@haveibeenpwned');
Route::get('/', 'FrontendController@index')->name('home');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact', 'FrontendController@contactUs')->name('contactPost');
Route::post('/product-inquire', 'FrontendController@productInquire')->name('productInquire');
Route::post('/service-inquire', 'FrontendController@serviceInquire')->name('serviceInquire');

Route::post('/subscribe', 'FrontendController@subscribe')->name('subscribePost');
Route::get('/news', 'FrontendController@news')->name('news');
Route::get('/news/{any}', 'FrontendController@newsDetail')->name('news.detail');
Route::get('/blogs', 'FrontendController@blog')->name('blog');
Route::get('/blog/{any}', 'FrontendController@blogDetail')->name('blog.detail');
Route::get('/service', 'FrontendController@service')->name('service');
Route::get('/service/{any}', 'FrontendController@serviceDetail')->name('service.detail');
Route::get('/products', 'FrontendController@product')->name('product');
Route::get('/product/{any}', 'FrontendController@productDetail')->name('product.detail');
Route::get('/partner', 'FrontendController@partner')->name('partner');

Route::get('/submit-an-incident', 'FrontendController@submitIncident')->name('submitIncident');
Route::post('/submitIncident', 'FrontendController@incidentMail')->name('incidentPost');
Route::post('/question', 'FrontendController@question')->name('question');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/mission', 'FrontendController@mission')->name('mission');
Route::get('/teams', 'FrontendController@teams')->name('team');
// Route::get('/privacy-policy', 'FrontendController@privacy')->name('privacy');
Route::get('{any}', 'FrontendController@dynamicPages')->name('getPages');

