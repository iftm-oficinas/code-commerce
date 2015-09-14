<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'where' => ['id' => '[0-9]+']], function () {

    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', ['as' => 'categories', 'uses' => 'AdminCategoriesController@index']);
        Route::post('/', ['as' => 'categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'AdminCategoriesController@create']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('destroy', ['as' => 'categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
            Route::get('edit', ['as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
            Route::put('update', ['as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);
        });
    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('/', ['as' => 'products', 'uses' => 'AdminProductsController@index']);
        Route::post('/', ['as' => 'products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'AdminProductsController@create']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('destroy', ['as' => 'products.destroy', 'uses' => 'AdminProductsController@destroy']);
            Route::get('edit', ['as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
            Route::put('update', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);

            Route::group(['prefix' => 'images'], function () {

                Route::get('/', ['as' => 'products.images', 'uses' => 'AdminProductsController@images']);
                Route::get('create', ['as' => 'products.images.create', 'uses' => 'AdminProductsController@createImage']);
                Route::post('store', ['as' => 'products.images.store', 'uses' => 'AdminProductsController@storeImage']);
                Route::get('destroy', ['as' => 'products.images.destroy', 'uses' => 'AdminProductsController@destroyImage']);
            });
        });
    });
});

Route::get('/', 'StoreController@index');

Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);

Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);

Route::group(['prefix' => 'cart'], function () {

    Route::get('/', ['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::get('destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('test', 'CheckoutController@test');
