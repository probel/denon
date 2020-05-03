<?php

/* FOR ADMIN */
Auth::routes();
/* disable default register route */
Route::any('register', function () {
    abort(404);
});
Route::any('/home', function () {
    return redirect('/admin');
})->name('home');
/* END FOR ADMIN */

Route::get('/', 'PageController@showFront')->name('front');
Route::get('/search',   'SearchController@search')->name('search');
Route::get('/contacts', 'PageController@contacts')->name('contacts');
Route::get('/delivery', 'PageController@delivery')->name('delivery');
Route::get('/warranty', 'PageController@warranty')->name('warranty');
Route::get('/sitemap.xml', 'PageController@sitemap')->name('sitemap');

Route::get('/category/{id?}', 'CatalogController@categoryFront')->name('category.front');

Route::group(['prefix' => '/news'], function () {
    Route::get('/', 'ArticleController@newsIndex')->name('news.index');
    Route::get('/{slug}', 'ArticleController@newsShow')->name('news.show');
});
Route::group(['prefix' => '/promo'], function () {
    Route::any('/', 'CatalogController@promoIndex')->name('promo.index');
    //Route::get('/{slug}', 'ArticleController@promoShow')->name('promo.show');
});
/* Route::group(['prefix' => '/installation'], function () {
    Route::get('/', 'ArticleController@installationIndex')->name('installation.index');
    Route::get('/{slug}', 'ArticleController@installationShow')->name('installation.show');
}); */

Route::group(['prefix' => '/cart'], function () {
    Route::get('/', 'CartController@show')->name('cart.show');
    Route::any('/set', 'CartController@set')->name('cart.set');
    Route::any('/remove', 'CartController@remove')->name('cart.remove');
    Route::any('/clear', 'CartController@clear')->name('cart.clear');
    Route::post('/order', 'OrderController@store')->name('order.store');
});
Route::any('/{slug}', 'CatalogController@resolver')->where('slug', '(?!admin).*')->name('resolver');
