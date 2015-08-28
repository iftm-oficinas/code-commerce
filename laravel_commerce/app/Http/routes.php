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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix'=>'categories'], function() {
        Route::get('/', 'AdminCategoriesController@index');
        Route::get('insert', ['as' => 'insert', 'uses' => 'AdminCategoriesController@insert']);
        Route::get('update', ['as' => 'update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('delete', ['as' => 'delete', 'uses' => 'AdminCategoriesController@delete']);
        Route::get('select', ['as' => 'select', 'uses' => 'AdminCategoriesController@select']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'AdminProductsController@index');
        Route::get('insert', ['as' => 'insert', 'uses' => 'AdminProductsController@insert']);
        Route::get('update', ['as' => 'update', 'uses' => 'AdminProductsController@update']);
        Route::get('delete', ['as' => 'delete', 'uses' => 'AdminProductsController@delete']);
        Route::get('select', ['as' => 'select', 'uses' => 'AdminProductsController@select']);
    });
});
