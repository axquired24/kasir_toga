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

// Cashier
Route::get('/','CashierController@index');
Route::post('app/cart/{action}','CashierController@cart');
Route::get('app/cart/{list}/x','CashierController@getCart');
// Get Product by kode / name -> return addToCart if single, return array if multi, else: error
Route::post('app/cart/getProduct/x','CashierController@getProduct_x');
// Checkout - 1. Check kode member is valid, 2. Payment Process
Route::match(['get', 'post'], 'app/checkout/{option?}', 'CashierController@checkout');
// Route::match(['get', 'post'], 'app/checkout/payment', 'CashierController@payment');

// Product
Route::match(['get', 'post'], 'app/product/{list}', 'ProductController@listView');
Route::get('app/product/list/x', 'ProductController@listData');

// Product Category
Route::match(['get', 'post'], 'app/product_category/{list}', 'ProductController@listCategoryView');
Route::get('app/product_category/list/x', 'ProductController@listCategoryData');

// User & Member
Route::match(['get', 'post'], 'app/member/{list}', 'UserController@listView');
Route::get('app/member/list/x', 'UserController@listData');
Route::get('app/member/tabungan/x', 'UserController@tabunganData');

// Store Option
Route::match(['get', 'post'], 'app/settings','CashierController@setOption');

// Laporan
Route::match(['get', 'post'], 'app/laporan/{list}','LaporanController@listView');
Route::get('app/laporan/invoice/x', 'LaporanController@invoiceData');

// Auth Disable register just use this.
// Route::auth();
Route::post('login', 'Auth\AuthController@login');
Route::get('login',  'Auth\AuthController@showLoginForm');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('/home', 'HomeController@index');
