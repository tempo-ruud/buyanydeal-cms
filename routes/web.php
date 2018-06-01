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
        Route::namespace('Catalog')->group(function () {
            Route::resource('attribute', 'AttributeController');
            Route::resource('attributegroup', 'AttributeGroupController');
            Route::resource('category', 'CategoryController');
            Route::resource('product', 'ProductController');
            Route::get('remove-image-category', 'CategoryController@removeImage')->name('category.remove.image');
            Route::get('remove-image-product', 'ProductController@removeImage')->name('product.remove.image');
        });
        Route::namespace('Cms')->group(function () {
            Route::resource('page', 'PageController');
        });
        Route::namespace('Dashboard')->group(function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');
        });
        Route::namespace('Language')->group(function () {
            Route::resource('language', 'LanguageController');
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