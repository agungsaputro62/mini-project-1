<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//
use App\Category;

//
use App\Product;

class CategoryController extends Controller
{
    //
    public function index () {

        // Menampilkan Semua Category
        $categories = Category::all();

        // Menggunakan Pagination - Menampilkan Gmbar Sebanyak 8
        $products = Product::with('galleries')->paginate(8);

        return view ('pages.category', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}