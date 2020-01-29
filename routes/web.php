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



Auth::routes();


Route::get('/', 'ImportController@index')->name('index');
Route::post('/', 'ImportController@import')->name('import');
/////////////////////////////////////////////////

Route::get('/export', 'ExportController@export')->name('export');
Route::get('/download', 'ExportController@download')->name('download');




















