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

/* WORK ROUTES */
//Route::get('/', 'PageController@showFront')->name('page');
/* END WORK ROUTES */

Route::get('/contacts', 'PageController@contacts')->name('contacts.show');
Route::get('/delivery', 'PageController@delivery')->name('delivery.show');
Route::get('/warranty', 'PageController@warranty')->name('warranty.show');



Route::get('/search',   'SearchController@search')->name('search.show');
Route::group(['prefix' => '/news'], function () {
  Route::get('/', 'ArticleController@newsIndex')->name('news.index');
  Route::get('/{slug}', 'ArticleController@newsShow')->name('news.show');
});

/* LAYOUT */
Route::any('/category', function () {
    return view('pages.category');
});
Route::any('/catalog-d', function () {
    return view('pages.catalog-d');
});
Route::any('/product', function () {
    return view('pages.product');
});
/* END LAYOUT */

/* WORK ROUTES */
Route::get('/', 'PageController@showFront')->name('front');
Route::group(['prefix' => '/cart'], function () {
    Route::get('/', 'CartController@show')->name('cart.show');
    Route::any('/set', 'CartController@set')->name('cart.set');
    Route::any('/remove', 'CartController@remove')->name('cart.remove');
    Route::any('/clear', 'CartController@clear')->name('cart.clear');
    Route::post('/order', 'OrderController@store')->name('order.set');
});
Route::any('/{slug}/', 'CatalogController@resolver')->where('slug', '(?!admin).*')->name('resolver');
/* END WORK ROUTES */



/* OLD, FOR EXAMPLES */
Route::group(['prefix' => '/actions'], function () {
    Route::any('/update/price', 'AdminController@remoteUpdatePrice')->name('catalog.update');
    Route::any('/reviews/add', 'ReviewController@store')->name('reviews.add');
    Route::any('/questions/add', 'QuestionController@store')->name('questions.add');
    Route::post('/comments/add', 'ArticleController@storeComment')->name('comments.add');

});
Route::get('/answers/{hash}', 'QuestionController@showMail')->name('answer');


Route::get('/test', 'PageController@test')->name('test');
Route::get('robots.txt', 'PageController@robots')->name('robots');
Route::get('/sitemap.xml', 'PageController@sitemap')->name('sitemap');
Route::get('/sitemap', 'PageController@pageSitemap')->name('page.sitemap');
Route::get('/success', 'OrderController@success')->name('success');
Route::get('/thankyou', 'CallbackController@success')->name('callback.success');
Route::any('/quick', 'OrderController@quick')->name('quick');
Route::group(['prefix' => '/blog'], function () {
  Route::get('/', 'ArticleController@blogIndex')->name('blog.index');
  Route::get('/{slug}', 'ArticleController@blogShow')->name('blog.show');
});
//Route::group(['prefix' => '/news'], function () {
//  Route::get('/', 'ArticleController@newsIndex')->name('news.index');
//  Route::get('/{slug}', 'ArticleController@newsShow')->name('news.show');
//});
Route::group(['prefix' => '/promo'], function () {
  Route::get('/', 'ArticleController@promoIndex')->name('promo.index');
  Route::get('/{slug}', 'ArticleController@promoShow')->name('promo.show');
});
Route::group(['prefix' => '/catalog'], function () {
    Route::get('/', 'CatalogController@show')->name('catalog.show');
    Route::any('/get', 'CatalogController@index')->name('catalog.get');
    Route::get('/{slug}', 'CatalogController@resolver')->name('catalog.category');
    //Route::get('/{category_slug}/{slug}', 'CatalogController@productFind')->name('catalog.product');
});
Route::group(['prefix' => '/callback'], function () {
    Route::post('/set', 'CallbackController@store')->name('callback.set');
    Route::post('/price', 'CallbackController@price')->name('callback.price');
});

//Route::get('/contacts', 'PageController@contacts')->name('contacts.show');
Route::get('/market.xml', 'CatalogController@market')->name('catalog.market');


//Route::get('/home', 'HomeController@index')->name('home');
/* END OLD */
