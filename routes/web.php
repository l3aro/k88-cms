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

Route::group(['namespace' => 'Client'], function () {

    Route::group(['middleware' => 'guest:client'], function () {
        Route::get('login', 'LoginController@showLoginForm');
        Route::post('login', 'LoginController@login');
    });

    Route::group(['middleware' => 'auth:client'], function () {
        Route::post('logout', 'LoginController@logout');
    });

    Route::get('', 'HomeController@index');
    Route::get('about', 'HomeController@about');
    Route::get('contact', 'HomeController@contact');

    Route::group(['prefix' => 'cart'], function () {
        Route::get('', 'CartController@index');
        Route::get('checkout', 'CartController@checkout');
        Route::get('complete', 'CartController@complete');
        Route::post('add', 'CartController@add');
        Route::post('remove', 'CartController@remove');
        Route::post('update', 'CartController@update');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'ProductController@index');
        Route::get('{category}', 'ProductController@index');
        Route::get('{category}/{product}', 'ProductController@detail');
    });
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'LoginController@login');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('categories', 'CategoryController');
        Route::get('', 'DashboardController');
        Route::post('logout', 'LoginController@logout');
        Route::group(['prefix' => 'orders'], function () {
            Route::get('', 'OrderController@index');
            Route::get('processed', 'OrderController@processed');
            Route::get('{order}/edit', 'OrderController@edit');
            Route::put('{order}', 'OrderController@update');
        });
        Route::group(['prefix' => 'products'], function () {
            Route::get('', 'ProductController@index');
            Route::get('create', 'ProductController@create');
            Route::post('', 'ProductController@store');
            Route::get('{product}/edit', 'ProductController@edit');
            Route::put('{product}', 'ProductController@update');
            Route::delete('{product}', 'ProductController@destroy');
            Route::get('{product}', 'ProductController@show');
        });
        Route::resource('users', 'UserController');
    });
});
