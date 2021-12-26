<?php

namespace App\Http\Controllers\Admin;

// Memanggil Model
use App\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Slug Helper Sendiri
use Illuminate\Support\Str;

// Memanggil Storage
use Illuminate\Support\Facades\Storage;

// Validasi
use App\Http\Requests\Admin\CategoryRequest;

// Memanggil Yajra DataTables
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Memanggil Ajax
        if(request()->ajax()) {
            $query = Category::query();

            return DataTables::of($query)
            ->addColumn('action', function($item) {
               return '
                <div class="btn-group">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                        type="button"
                        data-toggle="dropdown">
                        Aksi
                        </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('category.edit', $item->id) . '">
                            Sunting
                        </a>
                        <form action="'. route('category.destroy', $item->id) . '" method="POST">
                        '. method_field('delete'). csrf_field() .'
                            <button type="submit" class="dropdown-item text-danger">
                            Hapus
                            </button>
                         </form>
                        </div>
                    </div>
                </div>
               ';
            })

            // Edit Photo -> Photo Url Nya Tidak Lengkap, Kita Bikin Url Nya Lengkap
            ->editColumn('photo', function($item) {
                return $item->photo ? '<img src="'. Storage::url($item->photo) . '" style="max-height: 40px;" />' :'';
            })
            ->rawColumns(['action', 'photo'])
            ->make();
        }
        // Memanggil View
        return view ('pages.admin.category.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // Semua Data Masuk Category Request
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        // Menyimpan File
        $data['photo'] = $request->file(['photo'])->store('assets/category', 'public');

        Category::create($data);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // FindOrFail Adalah Kalau Datanya Tidak Ketemu , Bakal Dibalikin 404 Yaitu Tidak Ada, Kalau Ada Dia Akan Memanggil Baris Selanjutnya
        $item = Category::findOrFail($id);

        return view ('pages.admin.category.edit', [
            // Dalam Sini Tidak Boleh Pakai Simbol ;
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // Mengambil Semua Data
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file(['photo'])->store('assets/category', 'public');

        // Kita Ambil Berdasarkan Id
        $item = Category::findOrFail($id);

        // Jika Ada, Maka Akan Di Update Datanya
        $item->update($data);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Memanggil Model
        $item = Category::findOrFail($id);

        // Memanggil Fungsi Delete Jika Ada
        $item->delete();

        // Lempar Ke Pages Index
        return redirect()->route('category.index');
    }
}