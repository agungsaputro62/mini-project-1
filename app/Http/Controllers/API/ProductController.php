<?php

//
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

//
use Illuminate\Http\Request;

//
use App\Helpers\ResponseFormatter;

//
use App\Product;

class ProductController extends Controller
{

    //
    public function all(Request $request) {

        $id = $request->input('id');
        $name = $request->input('name');
        $users_id = $request->input('users_id');
        $categories_id = $request->input('categories_id');
        $price = $request->input('price');
        $description = $request->input('description');
        $slug = $request->input('slug');

        if($id) {
            $product = Product::with(['category', 'galleries'])->find($id);

            if($product) {
                return ResponseFormatter::success(
                    $product,
                    'Data Product Berhasil Diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    null,
                    'Data Product Tidak Ada',
                    404
                );
            }
        }

        $product = Product::with(['category', 'galleries']);

        if($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }

        if($description) {
            $product->where('description', 'like', '%' . $description . '%');
        }

        if($slug) {
            $product->where('description', 'like', '%' . $slug . '%');
        }

        if($price) {
            $product->where('price', '>=', $price);
        }

        if($categories_id) {
            $product->where('categories_id', 'categories_id');
        }

        // Semoga Berhasil
        return ResponseFormatter::success(
                    $product->paginate(),
                    'Data Product Berhasil Diambil'
                );
    }

    // // Melihat Semua Data Product
    // public function index () {

    //     //
    //     $products = Product::all();

    //     //
    //     return response()->json(['products' => $products], 200);

    // }

    //  // Melihat 1 Data Product Yang Kita Cari
    // public function show ($id) {

    //     //
    //     $products = Product::find($id);

    //     //
    //     if($products) {

    //         // Jika Ada Datanya
    //         return response()->json(['products' => $products], 200);
    //     }
    //     else {

    //         // No Found
    //         return response()->json(['message' => 'Tidak Ada Datanya'], 404);
    //     }

    //     //
    //     return response()->json(['products' => $products], 200);

    // }

    // // CREATE
    // public function store (ProductRequest $request) {

    //     //
    //     $product = new Product;
    //     $product->name = $request->name;
    //     $product->description = $request->desc;
    //     $product->price = $request->price;
    //     $product->qty = $request->qty;

    //     //
    //     $product->save();

    //     //
    //     return response()->json(['message' => 'Product Add Success'], 200);

    // }

    // // UPDATE
    // public function update (ProductRequest $request, $id) {

    //     //
    //     $product = Product::find($id);

    //     if ($product) {

    //         $product->name = $request->name;
    //     $product->description = $request->desc;
    //     $product->price = $request->price;
    //     $product->qty = $request->qty;

    //     //
    //     $product->update();

    //     //
    //     return response()->json(['message' => 'Product Update Success'], 200);

    //     }

    //     else {

    //         //
    //         return response()->json(['message' => 'No Found Product'], 404);

    //     }

    // }

    // // DELETE
    // public function delete ($id) {

    //     $product = Product::find($id);

    //     if ($product) {

    //     //
    //     $product->delete();

    //     //
    //     return response()->json(['message' => 'Product Deleted Success'], 200);

    //     }

    //     else {

    //         //
    //         return response()->json(['message' => 'No Found Product'], 404);

    //     }

    // }
}