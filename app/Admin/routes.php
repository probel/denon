<?php


Route::get('', ['as' => 'admin.dashboard', 'uses' => 'App\Http\Controllers\AdminController@index']);


Route::post('/save/image', ['as' => 'admin.save.image', 'uses' => 'App\Http\Controllers\AdminController@saveImage']);
Route::post('/save/fieldfile', ['as' => 'admin.save.fieldfile', 'uses' => 'App\Http\Controllers\AdminController@saveFieldFile']);
Route::post('/save/fieldimage', ['as' => 'admin.save.fieldimage', 'uses' => 'App\Http\Controllers\AdminController@saveFieldImage']);
Route::get('cities/export', ['as' => 'admin.export', 'uses' => 'App\Http\Controllers\AdminController@contactsExport']);
Route::get('cities/import', ['as' => 'admin.importForm', 'uses' => 'App\Http\Controllers\AdminController@contactsImportForm']);
Route::post('cities/import', ['as' => 'admin.import', 'uses' => 'App\Http\Controllers\AdminController@contactsImport']);
Route::get('metas/export', ['as' => 'admin.exportMeta', 'uses' => 'App\Http\Controllers\AdminController@metaExport']);
Route::get('metas/import', ['as' => 'admin.importMetaForm', 'uses' => 'App\Http\Controllers\AdminController@metaImportForm']);
Route::post('metas/import', ['as' => 'admin.importMeta', 'uses' => 'App\Http\Controllers\AdminController@metaImport']);
Route::post('order', ['as' => 'admin.order', 'uses' => 'App\Http\Controllers\AdminController@changeOrder']);
Route::get('products/update', ['as' => 'admin.updatePrices', 'uses' => 'App\Http\Controllers\AdminController@updatePrices']);
Route::get('compress', ['as' => 'admin.compress', 'uses' => 'App\Http\Controllers\AdminController@compress']);
Route::get('/download/callback/{id}/{file}', ['as' => 'admin.download', 'uses' => 'App\Http\Controllers\AdminController@downloadFile']);
