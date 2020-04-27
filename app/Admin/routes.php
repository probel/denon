<?php


Route::get('', ['as' => 'admin.dashboard', 'uses' => 'App\Http\Controllers\AdminController@index']);


Route::post('/save/image', ['as' => 'admin.save.image', 'uses' => 'App\Http\Controllers\AdminController@saveImage']);
Route::post('/save/fieldfile', ['as' => 'admin.save.fieldfile', 'uses' => 'App\Http\Controllers\AdminController@saveFieldFile']);
Route::post('/save/fieldimage', ['as' => 'admin.save.fieldimage', 'uses' => 'App\Http\Controllers\AdminController@saveFieldImage']);
Route::post('order', ['as' => 'admin.order', 'uses' => 'App\Http\Controllers\AdminController@changeOrder']);
Route::get('products/update', ['as' => 'admin.updatePrices', 'uses' => 'App\Http\Controllers\AdminController@updatePrices']);
Route::get('compress', ['as' => 'admin.compress', 'uses' => 'App\Http\Controllers\AdminController@compress']);
Route::get('/download/callback/{id}/{file}', ['as' => 'admin.download', 'uses' => 'App\Http\Controllers\AdminController@downloadFile']);
Route::get('products/import', ['as' => 'import', 'uses' => 'App\Http\Controllers\AdminController@importForm']);
Route::post('products/import', ['as' => 'import.store', 'uses' => 'App\Http\Controllers\AdminController@importStore']);
