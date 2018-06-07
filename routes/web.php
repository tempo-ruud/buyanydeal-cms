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

Route::group([
    'prefix' => 'buymin',
    'middleware' => ['admin'],
    'as' => 'admin.'
], function () {
    Route::namespace('Admin')->group(function () {
        Route::namespace('Brand')->group(function () {
            Route::resource('brand', 'BrandController');
            Route::get('remove-image-brand', 'BrandController@removeImage')->name('brand.remove.image');
        });
        Route::namespace('Dashboard')->group(function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');
        });
        Route::namespace('Shop')->group(function () {
            Route::resource('shop', 'ShopController');
            Route::get('remove-image-brand', 'ShopController@removeImage')->name('brand.remove.image');
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'as' => 'front.'
], function () {
    Route::namespace('Front')->group(function () {
        Route::namespace('Cms')->group(function () {
            Route::get("{slug}", 'PageController@getCms')->name('front.cms.slug');
        });
        Route::namespace('Product')->group(function () {
            Route::get("{slug}", 'ProductController@getProduct')->name('front.product.slug');
        });
    });
});