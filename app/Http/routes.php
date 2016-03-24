<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'wechat', 'namespace' => 'Wechat'], function () {
        Route::any('/', 'WechatController@serve');
        Route::get('/menu', 'WechatController@menu');
    });

    Route::group(['prefix' => 'register', 'namespace' => 'Register'], function () {
        Route::get('/create', 'RegisterController@create');
        Route::post('/store', 'RegisterController@store');
        Route::any('/send-message', 'RegisterController@sendMessage');
    });

    Route::group(['prefix' => 'shop', 'namespace' => 'Shop'], function () {
        Route::get('/', 'ShopController@index');
        Route::any('/get-products-by-cat-id', 'ShopController@getProductByCatID');
        Route::get('/product-detail', 'ShopController@productDetail');
        Route::any('/create-order', 'ShopController@createOrder');
        Route::any('/collect', 'ShopController@collect');
    });

    Route::group(['prefix' => 'supplier', 'namespace' => 'Supplier'], function () {
        Route::get('/', 'SupplierController@index');
        Route::get('/detail', 'SupplierController@detail');
        Route::any('/follow', 'SupplierController@follow');
    });

    Route::group(['prefix' => 'personal', 'namespace' => 'Personal'], function () {
        Route::get('/', 'SupplierController@index');
        Route::get('/attention-list', 'PersonalController@attentionList');
        Route::get('/order-list', 'PersonalController@orderList');
    });
//});
