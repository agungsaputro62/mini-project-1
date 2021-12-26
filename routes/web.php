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

// Category Id
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');

// Product Details - id Product Nya
Route::get('/details/{id}', 'DetailController@index')->name('detail');

// Product Details - id Product Nya
Route::post('/details/{id}', 'DetailController@add')->name('detail-add');

// Cart
// Route::get('/cart', 'CartController@index')->name('cart');

// Cart - Delete
Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');

// Transaksi Success
Route::get('/success', 'SuccessController@index')->name('success');

// Register Success
Route::get('/register/success', 'Auth\RegisterController@index')->name('register-success');

// Dashboard
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// // Dashboard Products
// Route::get('/dashboard/products', 'DashboardProductController@index')->name('dashboard-product');

// // Dashboard Products Detail Berdasarkan ID
// Route::get('/dashboard/products/{id}', 'DashboardProductDetailController@index')->name('dashboard-product-detail');

// // Dashboard Products Create
// Route::get('/dashboard/product/create', 'DashboardProductCreateController@create')->name('dashboard-product-create');

// // Dashboard Transanction
// Route::get('/dashboard/transactions', 'DashboardTransactionController@index')->name('dashboard-transactions');

// // Dashboard Transaction Details
// Route::get('/dashboard/transactions/{id}', 'DashboardTransactionDetailController@index')->name('dashboard-transaction-details');

// // Dashboard Setting Store
// Route::get('/dashboard/settings/store', 'DashboardSettingController@store')->name('dashboard-settings-store');

// // Dashboard Settting Account
// Route::get('/dashboard/settings/account', 'DashboardSettingController@account')->name('dashboard-settings-account');

//
Route::group(['middleware' => ['auth']], function () {

    Route::get('/cart', 'CartController@index')->name('cart');

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

});

// Roles Admin => Memisahkan Antara User Yang Membuka Website Home Dengan Admin
// Kita Bikin 3 Roles, User, Seller, Admin
// User Dan Seller Menjadi Satu Kesatuan Karena User Ini, User Adalah Memberi Dan Bisa Menjual Seperti Tokopedia
// Admin Adalah Yang Mengakses Dan Punya Akses Semua Data Dari Marketplace Sendiri, Misal Kita Punya Website Dengan
// Nama Store Hasanah, Membuka Seller Lainnya Untuk Jualan, Kita Merupakan Pemilik Dari Store Hasanah,
// Kita Bisa Melihat Misalnya Kalian Menjadi Membership Saya, Saya Bisa Liat Transaksi - Transaksi Kalian Karena
// Saya Mempunyai Hak Akses Admin, Yang Pertama Kita Bikin Di Dashboard Adalah Akses Sellers

// Admin - Prefix => Memanggil Semua Admin, Tidak Perlu Memanggil Satu2 (Bisa Dibungkus Dalam 1 Prefix)
// Url Masuk Ke Dalam admin
Route::prefix('admin')
// namespace App\Http\Controllers\Admin;
->namespace('Admin')
->middleware(['auth', 'admin'])
// Dia Harus Login Terlebih Dahulu Dan Dia Harus Admin
// ->middleware(['auth', 'admin'])
// Bisa Menaruh Semuanya Disini
->group(function() {
    Route::get('/', 'DashboardController@index')->name('admin-dashboard');
    // Menggunakan Resource - Memanggil Menggunakan category Saat Layout Admin
    Route::resource('/category', 'CategoryController');
    Route::resource('/user', 'UserController');
    Route::resource('/product', 'ProductController');
    Route::resource('/product-gallery', 'ProductGalleryController');
});

Auth::routes();