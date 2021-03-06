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

Route::get('/', 'NoticesController@index');

Auth::routes();

Route::get('/home', 'PagesController@index')->name('home');

Route::post('notices/confirm', 'NoticesController@confirm')->name('confirm');

Route::resource('notices','NoticesController');