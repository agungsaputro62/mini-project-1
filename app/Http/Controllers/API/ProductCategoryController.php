<?php

namespace App\Http\Controllers\API;


//
use App\Category;

//
use Illuminate\Http\Request;

//
use App\Helpers\ResponseFormatter;

use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    //
    public function all (Request $request) {
        $id = $request->input('id');
        $name = $request->input('name');
        $photo = $request->input('photo');
        $slug = $request->input('slug');

        if($id) {
            $category = Category::with(['products'])->find($id);

            if($category) {
                return ResponseFormatter::success(
                    $category,
                    'Data Category Berhasil Diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    null,
                    'Data Category Tidak Ada',
                    404
                );
            }
        }

        $category = Category::query();

        if($name) {
            $category->where('name', 'like', '%' . $name . '%');
        }

        if($photo) {
            $category->with('products');
        }

            return ResponseFormatter::success(
                    $category->paginate(),
                    'Data Category Berhasil Diambil'
                );
    }
}
