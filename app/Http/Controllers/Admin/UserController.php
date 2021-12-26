<?php

namespace App\Http\Controllers\Admin;

// Memanggil Model
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Slug Helper Sendiri
use Illuminate\Support\Str;

// Memanggil Storage
use Illuminate\Support\Facades\Storage;

// Validasi
use App\Http\Requests\Admin\UserRequest;

// Memanggil Yajra DataTables
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
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
            $query = User::query();

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
                            <a class="dropdown-item" href="' . route('user.edit', $item->id) . '">
                            Sunting
                        </a>
                        <form action="'. route('user.destroy', $item->id) . '" method="POST">
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
            ->rawColumns(['action'])
            ->make();
        }
        // Memanggil View
        return view ('pages.admin.user.index');
    }

    /**
     *
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // Semua Data Masuk User Request
        $data = $request->all();

        // Bikin Passwqord - bcrypt => Untuk Tidak Kebaca Password Orang Di Database
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('user.index');
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
        $item = User::findOrFail($id);

        return view ('pages.admin.user.edit', [
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
    public function update(UserRequest $request, $id)
    {
        // Mengambil Semua Data
        $data = $request->all();

        // Kita Ambil Berdasarkan Id
        $item = User::findOrFail($id);

        // Kondisi Passowrd
        if($request->passowrd) {
            // Jika Ada Password Jalankan
            $data['password'] = bcrypt($request->password);
        }
        // Jika Kalau Ga Ada Password
        else {
            // Password Ada Tapi Isinya Kosong
            unset($data['password']);
        }

        // Jika Ada, Maka Akan Di Update Datanya
        $item->update($data);

        return redirect()->route('user.index');
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
        $item = User::findOrFail($id);

        // Memanggil Fungsi Delete Jika Ada
        $item->delete();

        // Lempar Ke Pages Index
        return redirect()->route('user.index');
    }
}