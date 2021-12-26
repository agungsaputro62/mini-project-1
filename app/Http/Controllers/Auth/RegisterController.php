<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

//
use App\User;

//
use App\Category;



//
use Illuminate\Foundation\Auth\RegistersUsers;

//
use Illuminate\Support\Facades\Hash;

//
use Illuminate\Support\Facades\Validator;

// Include Request Untuk Membuat API
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // Memanggil Model Category Data Semua
        $categories = Category::all();

        // Parsing Data Ke View
        return view('auth.register', [
            'categories' => $categories
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            // Validasi Register
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            // Validasi Toko
            'store_name' => ['nullable', 'string', 'max:255'],
            'categories_id' => ['nullable', 'integer', 'exists:categories,id'],
            'is_store_open' => ['required',],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([

            // Membuat Akun User
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            // Membuat Akun Toko - Dicek Datanya Kalau Ada Eksekusi Kalau Ga Ada Diisi Kosong
            'store_name' => isset($data['store_name']) ? $data['store_name'] : '',
            'categories_id' => isset($data['categories_id']) ? $data['categories_id'] : NULL,
            'store_status' => isset($data['is_store_open']) ? 1 : 0,

        ]);
    }

    public function success () {
        return view ('auth.success');
    }

        // API   Cek Register Yang Sudah Terdaftar
        public function check(Request $request) {

        // Apakah User Ini Ada Atau Gak Jika Lebih Dari 0 Jika Ada 1 Unavailable
        return User::where('email', $request->email)->count() > 0 ? 'Unavailable' : 'Available';
    }

    // API   Cek Register Yang Sudah Terdaftar
        public function register(Request $request) {

        // Apakah User Ini Ada Atau Gak Jika Lebih Dari 0 Jika Ada 1 Unavailable
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $token = $user->createToken('token-name')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);

    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

}