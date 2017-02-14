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
    return view('aplikasi.kasir');
});

// Product
Route::match(['get', 'post'], 'app/product/{list}', 'ProductController@listView');
Route::get('app/product/list/x', 'ProductController@listData');

// Product Category
Route::match(['get', 'post'], 'app/product_category/{list}', 'ProductController@listCategoryView');
Route::get('app/product_category/list/x', 'ProductController@listCategoryData');