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

Route::get('/', 'HomeController@index');

Route::namespace('Auth')->group(function () {
//    Route::get('register', 'RegisterController@create');
});

Route::post('/sendRequest', 'HomeController@sendRequest');


Route::middleware(['auth'])->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::prefix('admin')->group(function () {

            Route::post('upload', 'UploadController@index');

            //User
            Route::prefix('users')->group(function () {
                Route::get('', 'UserController@index');
                Route::get('list', 'UserController@getList');
            });
            Route::post('user/{id}', 'UserController@save')->where('id', '[0-9]+');
            Route::post('user', 'UserController@save');
            Route::get('user/{id}', 'UserController@getOne')->where('id', '[0-9]+');
            Route::delete('user/{id}', 'UserController@destroy')->where('id', '[0-9]+');

            // Landing data
            Route::prefix('landings')->group(function () {
                Route::get('', 'LandingController@index');
                Route::get('list', 'LandingController@getData');
            });
            Route::post('landing/{id}', 'LandingController@save')->where('id', '[0-9]+');
            Route::post('landing', 'LandingController@save');
            Route::get('landing/{id}', 'LandingController@getOne')->where('id', '[0-9]+');
//            Route::delete('data/{id}', 'LandingController@destroy')->where('id', '[0-9]+');

            //Menu
            Route::prefix('menus')->group(function () {
                Route::get('', 'MenuController@index');
                Route::get('list', 'MenuController@getList');
            });
            Route::post('menu/{id}', 'MenuController@save')->where('id', '[0-9]+');
            Route::post('menu', 'MenuController@save');
            Route::get('menu/{id}', 'MenuController@getOne')->where('id', '[0-9]+');
            Route::delete('menu/{id}', 'MenuController@destroy')->where('id', '[0-9]+');

            //Technology
            Route::prefix('technologies')->group(function () {
                Route::get('', 'TechnologyController@index');
                Route::get('list', 'TechnologyController@getList');
            });
            Route::post('technology/{id}', 'TechnologyController@save')->where('id', '[0-9]+');
            Route::post('technology', 'TechnologyController@save');
            Route::get('technology/{id}', 'TechnologyController@getOne')->where('id', '[0-9]+');
            Route::delete('technology/{id}', 'TechnologyController@destroy')->where('id', '[0-9]+');

            //Product
            Route::prefix('products')->group(function () {
                Route::get('', 'ProductController@index');
                Route::get('list', 'ProductController@getList');
            });
            Route::post('product/{id}', 'ProductController@save')->where('id', '[0-9]+');
            Route::post('product', 'ProductController@save');
            Route::get('product/{id}', 'ProductController@getOne')->where('id', '[0-9]+');
            Route::delete('product/{id}', 'ProductController@destroy')->where('id', '[0-9]+');

            //Slider
            Route::prefix('sliders')->group(function () {
                Route::get('', 'SliderController@index');
                Route::get('list', 'SliderController@getList');
            });
            Route::post('slider/{id}', 'SliderController@save')->where('id', '[0-9]+');
            Route::post('slider', 'SliderController@save');
            Route::get('slider/{id}', 'SliderController@getOne')->where('id', '[0-9]+');
            Route::delete('slider/{id}', 'SliderController@destroy')->where('id', '[0-9]+');

            //Request
            Route::prefix('requests')->group(function () {
                Route::get('', 'RequestController@index');
                Route::get('list', 'RequestController@getList');
            });
            Route::get('request/{id}', 'RequestController@getOne')->where('id', '[0-9]+');
            Route::delete('request/{id}', 'RequestController@destroy')->where('id', '[0-9]+');
        });
    });
});

Auth::routes();