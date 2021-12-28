<?php

//
namespace App\Http\Controllers\API;

//
use App\User;

// V
use Illuminate\Http\Request;

// V
use Exception;

// V
use App\Helpers\ResponseFormatter;

// V
use App\Http\Controllers\Controller;

// V
use Illuminate\Support\Facades\Auth;

// V
use Illuminate\Support\Facades\Hash;

//
// use Illuminate\Support\Facades\Password;

// V
// use App\Http\Requests\Admin\UserRequest;



class UserController extends Controller
{
    //
    public function register (Request $request) {

            try {

                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'max:255', 'unique:users'],
                    'phone_number' => ['required', 'string', 'max:255'],
                    'password' => ['required', 'string'],
            ]);

                User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'User Registered');
        }
        catch (Exception $error) {
                return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function login (Request $request) {

        try {
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            $user = User::where('email', $request->email)->first();

            if(! Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
        }
        catch (Exception $error) {
            return ResponseFormatter::error([
                    'message' => 'Something Went Wrong',
                    'error' => $error
                ], 'Authentication Failed', 500);
        }
    }

    public function fetch (Request $request) {
        return ResponseFormatter::success($request->user(), 'Data Profile User Berhasil Diambil');
    }

    public function updateProfile (Request $request) {

        $request['password'] = Hash::make($request['password']);

        $data = $request->all();
        $user = Auth::user();
        $user->update($data);

        return ResponseFormatter::success($user, 'Profile Updated');
    }

    public function logout (Request $request) {

        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }
}