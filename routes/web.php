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
