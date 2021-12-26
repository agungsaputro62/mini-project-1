<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//
use App\Http\Controllers\API\ProductController;

//
use App\Http\Controllers\Auth\RegisterController;

//


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Register
Route::post('/register', 'Auth\RegisterController@register')->name('api-register');



Route::middleware(['auth:sanctum'])->group(function() {

    //
//     Route::get('user', 'API/UserController@fetch')->name('api-fetch');

//     // Logout
//     Route::post('/logout', 'Auth\RegisterController@logout')->name('api-logout');

//    // Params - Menampilkan Semua Data Product - Success
// //    Route::get('/products', 'API\ProductController@index')->name('api-product-index');

//    // Params - Menampilkan 1 Data Product Yang Ingin Dicari -
//    Route::get('/product/show/{id}', 'API\ProductController@show')->name('api-product-show');

//     // http://127.0.0.1:8000/product/add => CREATE PRODUCT - Success
//     Route::post('/product/add', 'API\ProductController@store')->name('api-product-add');

//     // Cara 2 Menggunakan POST- UPDATE Product -
//     Route::post('/product/update/{id}', 'API\ProductController@update')->name('api-product-update');

//     // Delete - DELETE Product -
//     Route::delete('/product/delete/{id}', 'API\ProductController@delete')->name('api-product-delete');

});

// coba DEPLOY
Route::get('/products', 'API\ProductController@all')->name('api-products-all');

//
Route::get('/categories', 'API\ProductCategoryController@all')->name('api-product-category');

//
Route::get('/register', 'API\UserController@register')->name('api-user-register');




// Cek Register Yang Sudah Terdaftar
Route::get('register/check', 'Auth\RegisterController@check')->name('api-register-check');

// Cek Provinsi Yang Terdaftar
Route::get('provinces', 'API\LocationController@provinces')->name('api-provinces');

// Cek Kota Yang Terdaftar Dari Provinsi

Route::get('regencies/{provinces_id}', 'API\LocationController@regencies')->name('api-regencies');
