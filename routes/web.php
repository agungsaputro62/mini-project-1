<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// Home
Route::get('/', 'HomeController@index')->name('home');

// Category
Route::get('/categories', 'CategoryController@index')->name('categories');

// Product Details - id Product Nya
Route::get('/details/{id}', 'DetailController@index')->name('detail');

// Cart
Route::get('/cart', 'CartController@index')->name('cart');

// Transaksi Success
Route::get('/success', 'SuccessController@index')->name('success');

// Register Success
Route::get('/register/success', 'Auth\RegisterController@index')->name('register-success');

// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Dashboard Products
Route::get('/dashboard/products', 'DashboardProductController@index')->name('dashboard-product');

// Dashboard Products Detail Berdasarkan ID
Route::get('/dashboard/products/{id}', 'DashboardProductDetailController@index')->name('dashboard-product-detail');

// Dashboard Products Create
Route::get('/dashboard/product/create', 'DashboardProductCreateController@create')->name('dashboard-product-create');

// Dashboard Transanction
Route::get('/dashboard/transactions', 'DashboardTransactionController@index')->name('dashboard-transactions');

// Dashboard Transaction Details
Route::get('/dashboard/transactions/{id}', 'DashboardTransactionDetailController@index')->name('dashboard-transaction-details');

// Dashboard Setting Store
Route::get('/dashboard/settings/store', 'DashboardSettingController@store')->name('dashboard-settings-store');

// Dashboard Settting Account
Route::get('/dashboard/settings/account', 'DashboardSettingController@account')->name('dashboard-settings-account');



Auth::routes();
